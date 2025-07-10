<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting;

class PembayaranController extends Controller
{
    // Tampilkan halaman pembayaran
    public function form($id)
    {
        $post = Posting::findOrFail($id);

        // Hanya boleh dibayar jika status approved
        if ($post->status !== 'approved') {
            return redirect()->back()->with('error', 'Postingan belum disetujui, tidak bisa membayar.');
        }

        return view('pembayaran', compact('post'));
    }

    // Proses submit pembayaran
    public function bayar(Request $request, $id)
    {
        $post = Posting::findOrFail($id);

        // Misal hanya mengubah status jadi "menunggu pembayaran" (simulasi)
        $post->status = 'menunggu_pembayaran';
        $post->save();

        return redirect()->route('riwayat')->with('success', 'Pembayaran berhasil diajukan.');
    }
}
