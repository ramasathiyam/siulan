<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\lombaterbaru;
use App\Http\Controllers\penandaController;
use App\Http\Controllers\postingController;
use App\Http\Controllers\riwayatController;
use App\Http\Controllers\tentangkamiController;

Route::get('/home', [homeController::class, 'index'] )->name('home');
// Route::get('/', function() {
//     return view('home');
// })->name('/');
Route::get('/posting', [postingController::class, 'index'] )->name('posting');
Route::get('/lombaterbaru', [lombaTerbaru::class, 'index'] )->name('lombaterbaru');
Route::get('/riwayat', [riwayatController::class, 'index'] )->name('riwayat');
Route::get('/penanda', [penandaController::class, 'index'] )->name('penanda');
Route::get('/tentangkami', [tentangkamiController::class, 'index'] )->name('tentangkami');