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

        return view('pembayaran', [
            'post' => $post,
            'paket' => $paket,
            'snapToken' => null, // belum ada token
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

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $orderId = uniqid('ORDER-');
        $amount = $paket->harga;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->username ?? 'Guest',
                'email' => Auth::user()->email ?? 'guest@example.com',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            // Simpan Snap Token ke postingan
            $post->update([
                'snap_token' => $snapToken,
                'status' => 'approved',
            ]);

            return view('pembayaran', [
                'post' => $post,
                'paket' => $paket,
                'snapToken' => $snapToken,
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
