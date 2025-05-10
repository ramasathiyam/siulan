<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|min:8',
        ]);

        // Auth::attempt($request->only('username','password'));

        // return redirect()->route('home');

        if (Auth::attempt($request->only('username','password'))) {
            return redirect()->route('home');
        }
        return back()->withErrors(['username' => 'Username atau password salah.',]);
    }
}