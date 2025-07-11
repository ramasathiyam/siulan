<?php

namespace App\Http\Controllers;
use App\Models\Penanda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PenandaController extends Controller
{
   public function tandai($id)
    {
        $userId = Auth::id();

        $cek = Penanda::where('user_id', $userId)->where('postingan_id', $id)->first();
        if (!$cek) {
            Penanda::create([
                'user_id' => $userId,
                'postingan_id' => $id
            ]);
        }

        return back()->with('success', 'Postingan ditandai.');
    }

    public function index()
    {
        $userId = Auth::id();
        $penanda = Penanda::where('user_id', $userId)->with('postingan')->get();

        return view('penanda', compact('penanda'));
    }

}