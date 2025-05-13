<?php

namespace App\Http\Controllers;
use App\Models\Posting;

class AdminController extends Controller
{
    // public function index(){
    //     return view('admin');
    // }

     public function index()
    {
        $data = Posting::all(); // ambil semua data dari tabel postings
        return view('admin', compact('data')); // kirim ke view
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