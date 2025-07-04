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

    // Kirim data ke halaman checkout (tanpa menyimpan ke DB)
    return view('checkout', [
        'data' => $validated,
        'postingan' => $postingan
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

    $pendaftar = Pendaftar::create($validated);

    return redirect()->route('checkout.show', ['id' => $pendaftar->id]);
}

}