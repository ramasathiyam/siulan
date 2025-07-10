<?php

namespace App\Http\Controllers;
use App\Models\Posting;
use Illuminate\Support\Facades\Auth;

class riwayatController extends Controller
{
  public function index()
    {
        $userId = Auth::id(); // Ambil ID user yang login

        // Ambil semua postingan user ini
        $postingan = Posting::where('user_id', $userId)
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('riwayat', compact('postingan'));
    }
}



