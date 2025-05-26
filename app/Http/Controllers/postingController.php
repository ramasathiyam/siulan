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
            'PaketPostingan' => 'required|string|in:Basic,Medium,Premium',
            'JudulKegiatan' => 'required|string',
            'Deskripsi' => 'required|string',
            'JenisKegiatan' => 'required|string|in:Lomba,Seminar,Webinar',
            'Kategori' => 'required|string|in:Teknologi,Bisnis,Olahraga',
            'Lokasi' => 'required|string',
            'TautanPendaftaran' => 'required|url',
            'KontakInstagram' => 'required|string',
            'KontakWebsite' => 'nullable|string',
            'KontakYoutube' => 'nullable|string',
            'Poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'PaketPostingan.in' => 'Pilih Paket Postingan',
            'JudulKegiatan.required' => 'Judul kegiatan wajib diisi',
            'Deskripsi.required' => 'Deskripsi wajib diisi',
            'JenisKegiatan.required' => 'Jenis Kegiatan wajib dipilih.',
            'JenisKegiatan.in' => 'Pilih Jenis Kegiatan',
            'Kategori.in' => 'Kategori yang dipilih tidak valid.',
            'Lokasi.required' => 'Pilih Lokasi',
            'TautanPendaftaran.url' => 'Tautan pendaftaran harus berupa URL yang valid.',
            'TautanPendaftaran.required' => 'Tautan pendaftaran wajib di isi.',
            'KontakInstagram.required' => 'Masukkan Instagram.',
            'Poster.required' => 'Poster wajib diunggah.',
            'Poster.mimes' => 'Poster harus berupa file JPG atau PNG.',
            ]);


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

}