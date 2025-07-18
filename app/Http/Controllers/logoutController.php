<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // optional: clears session
        $request->session()->regenerateToken(); // optional: regenerate token for safety
        return redirect()->route('home'); // or login page
    }
}
