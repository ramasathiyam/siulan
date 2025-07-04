<?php

namespace App\Http\Controllers;
use App\Models\Posting;

class lombaterbaru extends Controller
{
   public function show($id){
    $postingan = Posting::findOrFail($id); 
    // atau where('id_paket', $id) jika pakai id_paket
    return view('lombaTerbaru', ['postingan'=>$postingan]);
    }
}