<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;

class postingController extends Controller
{
    public function index()
    {
        return view('Posting');
    }

    

    public function posting(Request $request)
    {
        $request->validate([
            'PaketPostingan' => 'required|string',
            'JudulKegiatan' => 'required|string',
            'Deskripsi' => 'required|string',
            'JenisKegiatan' => 'required|string',
            'Kategori' => 'required|string|in:Teknologi,Bisnis,Olahraga',
            'Lokasi' => 'required|string',
            'TautanPendaftaran' => 'required|string',
            'KontakInstagram' => 'required|string',
            'KontakWebsite' => 'required|string',
            'KontakYoutube' => 'required|string',
            'Poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Tambahkan ini untuk debug
        // dd($request->file('Poster'));

        // Simpan file poster ke storage/app/public/poster
        $posterPath = $request->file('Poster')->store('poster', 'public');

        // Posting::create($request->all());
        // Simpan ke database dengan path poster yang benar
        Posting::create([
            'PaketPostingan' => $request->PaketPostingan,
            'JudulKegiatan' => $request->JudulKegiatan,
            'Deskripsi' => $request->Deskripsi,
            'JenisKegiatan' => $request->JenisKegiatan,
            'Kategori' => $request->Kategori,
            'Lokasi' => $request->Lokasi,
            'TautanPendaftaran' => $request->TautanPendaftaran,
            'KontakInstagram' => $request->KontakInstagram,
            'KontakWebsite' => $request->KontakWebsite,
            'KontakYoutube' => $request->KontakYoutube,
            'Poster' => $posterPath
        ]);

        return redirect()->route('tentangkami')->with('success', 'Postingan berhasil ditambahkan.');
    }

    public function approve($id)
    {
        $post = Posting::findOrFail($id);
        $post->status = 'approved';
        $post->save();

        return back()->with('success', 'Postingan berhasil disetujui.');
    }

    public function reject($id)
    {
        $post = Posting::findOrFail($id);
        $post->status = 'rejected';
        $post->save();

        return back()->with('success', 'Postingan ditolak.');
    }

}