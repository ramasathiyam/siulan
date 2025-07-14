<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting;
use App\Models\Paket;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    // Tampilkan form pembayaran (tanpa token)
    public function form($id)
    {
        $post = Posting::findOrFail($id);

        if ($post->status !== 'approved') {
            return redirect()->back()->with('error', 'Postingan belum disetujui, tidak bisa melakukan pembayaran.');
        }

        $paket = Paket::find($post->id_paket);
        if (!$paket) {
            return redirect()->back()->with('error', 'Paket tidak ditemukan.');
        }

        // HITUNG DISKON SAMA SEPERTI DI bayar()
        $jumlahPostingSebelumnya = Posting::where('user_id', $post->user_id)
            ->where('id', '<', $post->id)
            ->count();

        $diskonPersen = 0;
        if (($jumlahPostingSebelumnya + 1) % 5 == 0) {
            $diskonPersen += 20;
        }

        if (now()->format('m-d') === '08-17') {
            $diskonPersen += 15;
        }

        $hargaAwal = $paket->harga;
        $hargaFinal = (int) round($hargaAwal * (1 - ($diskonPersen / 100)));

        return view('pembayaran', [
            'post' => $post,
            'paket' => $paket,
            'snapToken' => null,
            'hargaFinal' => $hargaFinal, // <-- Kirim ini ke Blade
        ]);
    }

    // Proses bayar & generate Snap Token
  public function bayar(Request $request, $id)
{
    $post = Posting::findOrFail($id);

    if ($post->status !== 'approved') {
        return redirect()->back()->with('error', 'Postingan belum disetujui, tidak bisa melakukan pembayaran.');
    }

    $paket = Paket::find($post->id_paket);
    if (!$paket) {
        return redirect()->back()->with('error', 'Paket tidak ditemukan.');
    }

    // Ambil jumlah postingan yang sudah pernah diposting user sebelumnya
    $jumlahPostingSebelumnya = Posting::where('user_id', $post->user_id)
        ->where('id', '<', $post->id)
        ->count();

    // Hitung diskon
    $diskonPersen = 0;
    if (($jumlahPostingSebelumnya + 1) % 5 == 0) {
        $diskonPersen += 20; // Diskon untuk setiap kelipatan 5
    }

    if (now()->format('m-d') === '08-17') {
        $diskonPersen += 15; // Tambahan diskon jika 17 Agustus
    }

    $hargaAwal = $paket->harga;
    $hargaFinal = (int) round($hargaAwal * (1 - ($diskonPersen / 100)));

    // Konfigurasi Midtrans
    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $orderId = uniqid('ORDER-');

    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => $hargaFinal,
        ],
        'customer_details' => [
            'first_name' => Auth::user()->username ?? 'Guest',
            'email' => Auth::user()->email ?? 'guest@example.com',
        ],
    ];

    try {
        $snapToken = Snap::getSnapToken($params);

        $post->update([
            'snap_token' => $snapToken,
            'status' => 'approved',
        ]);

        return view('pembayaran', [
            'post' => $post,
            'paket' => $paket,
            'snapToken' => $snapToken,
            'hargaFinal' => $hargaFinal, // dipakai di blade
        ]);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal membuat token pembayaran: ' . $e->getMessage());
    }
}

    // Endpoint API untuk mengambil Snap Token
    public function getSnapToken($id)
    {
        $post = Posting::findOrFail($id);

        if (!$post->snap_token) {
            return response()->json(['error' => 'Snap token belum tersedia'], 404);
        }

        return response()->json([
            'snap_token' => $post->snap_token,
        ]);
    }
}
