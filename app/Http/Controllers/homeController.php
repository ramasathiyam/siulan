<?php

namespace App\Http\Controllers;
use App\Models\Posting;
use App\Models\paket;
use Illuminate\Http\Request;


class homeController extends Controller
{
    public function index(){
    $postingan = Posting::whereNotNull('snap_token')->latest()->take(10)->get();
    $popupPost = null;

    // Ambil popup hanya jika session belum ada
    if (!session()->has('popup_shown')) {
        $popupPost = Posting::whereHas('paket', function ($q) {
                $q->where('nama', 'Premium');
            })
            ->whereNotNull('snap_token')
            ->where('snap_token', '!=', '')
            ->latest()
            ->first();

        session(['popup_shown' => true]);
    }

    return view('home', compact('postingan', 'popupPost'));
    }


    public function search(Request $request){
    $query = Posting::query();
    

    $query->whereNotNull('snap_token')->where('snap_token', '!=', '');

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