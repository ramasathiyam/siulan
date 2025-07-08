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
        $credentials = $request->validate([
            'username'=>'required|string',
            'password'=>'required|min:8',
        ]);
        
                // Mencoba untuk melakukan otentikasi
        if (Auth::attempt($credentials)) {
            // Penting untuk keamanan: regenerate session setelah login
            $request->session()->regenerate();

            // Cek peran pengguna dan alihkan sesuai rolenya
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin');
            }

            // Jika bukan admin (misal: 'user'), alihkan ke home
            return redirect()->route('home');
        }

        if (Auth::attempt($request->only('username','password'))) {
            return redirect()->route('home');
        }
        return back()->withErrors(['username' => 'Username atau password salah.',]);
    }
}