<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class daftarController extends Controller
{
    public function index(){
        return view('daftar');
    }

    public function daftar(Request $request){
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|confirmed|min:8',
            'password_confirmation'=>'required',
        ]);

        User::create([
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
        ]);

        Auth::attempt($request->only('username','password'));

        return redirect()->route('home');
    }
}