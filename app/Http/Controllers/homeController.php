<?php

namespace App\Http\Controllers;
use App\Models\Posting;
use Illuminate\Http\Request;


class homeController extends Controller
{
    public function index(){
        $postingan = Posting::whereNotNull('Snap_token')->latest()->take(10)->get();
        return view('home',['postingan'=>$postingan]);
    }

    public function search(Request $request){
    $query = Posting::query();
    

    $query->whereNotNull('Snap_token')->where('Snap_token', '!=', '');

    // Filter pencarian teks
    if ($request->filled('search')) {
        $search = strtolower($request->search);
        $query->where(function ($q) use ($request) {
            $q->where('JudulKegiatan', 'like', '%' . $request->search . '%')
              ->orWhere('Deskripsi', 'like', '%' . $request->search . '%')
              ->orWhere('Lokasi', 'like', '%' . $request->search . '%');
        });
    }

    // Filter bidang (gunakan `Kategori` kolomnya jika maksud "bidang")
    if ($request->filled('kategori')) {
        $query->where('Kategori', 'like', '%' . $request->kategori . '%');
    }

    // Filter kategori kegiatan (Seminar, Lomba, Webinar, dsb)
    if ($request->filled('jenis_kegiatan')) {
        $query->where('JenisKegiatan', $request->jenis_kegiatan);
    }

    // Ambil data postingan (misal limit 10 terbaru)
    $postingan = $query->latest()->take(10)->get();

    return view('home', compact('postingan'));
}

}