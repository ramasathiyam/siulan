<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posting;
use App\Models\Pendaftar;

class daftarlombaController extends Controller
{


    public function show($id){
    $postingan = Posting::findOrFail($id); 
    // atau where('id_paket', $id) jika pakai id_paket
    return view('daftarlomba', ['postingan'=>$postingan]);
    }

   public function preview(Request $request)
{
    // Validasi data terlebih dahulu
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email',
        'telepon' => 'required',
        'kategori' => 'required',
        'institusi' => 'required',
        'keterangan' => 'nullable|string',
        'id_postingan' => 'required|exists:postingan,id',
    ]);

    // Ambil data postingan berdasarkan ID
    $postingan = Posting::findOrFail($validated['id_postingan']);

    // Buat snap token untuk preview
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => 'PREVIEW-' . time(),
                'gross_amount' => $postingan->Harga,
            ),
            'customer_details' => array(
                'first_name' => $validated['nama'],
                'last_name' => '',
                'email' => $validated['email'],
                'phone' => $validated['telepon'],
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Kirim data ke halaman checkout dengan snap token
        return view('checkout', [
            'data' => $validated,
            'postingan' => $postingan,
            'snapToken' => $snapToken
        ]);
}

public function store(Request $request)
{
    // Validasi ulang untuk keamanan
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email',
        'telepon' => 'required',
        'kategori' => 'required',
        'institusi' => 'required',
        'keterangan' => 'nullable|string',
        'id_postingan' => 'required|exists:postingan,id',
    ]);

    //Ambil data postingan berdasarkan ID
    $postingan = Posting::findOrFail($validated['id_postingan']);

    $pendaftar = Pendaftar::create($validated);

    // Konfigurasi Midtrans
    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    $params = array(
            'transaction_details' => array(
                'order_id' => 'ORDER-' . $pendaftar->id . '-' . time(),
                'gross_amount' => $postingan->Harga, // Menggunakan harga dari tabel posting
            ),
            'customer_details' => array(
                'name' => $validated['nama'],
                'email' => $validated['email'],
                'phone' => $validated['telepon'],
            ),
        );

    $snapToken = \Midtrans\Snap::getSnapToken($params);

    // Simpan snap token ke database
    $pendaftar->update(['snap_token' => $snapToken]);

    return redirect()->route('checkout.show', ['id' => $pendaftar->id])
                        ->with('snapToken', $snapToken);
}

}