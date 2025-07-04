<?php

namespace App\Http\Controllers;
use App\Models\Posting;
use App\Models\Pendaftar;

class checkoutController extends Controller
{
    public function index(){
        $postingan = Posting::all();
        return view('checkout',['postingan'=>$postingan]);
    }


     public function show($id){
        $pendaftar = Pendaftar::findOrFail($id);
        return view('checkout',['postingan'=>$pendaftar]);
    }

     
}