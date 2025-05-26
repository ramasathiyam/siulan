<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\daftarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\lombaterbaru;
use App\Http\Controllers\penandaController;
use App\Http\Controllers\postingController;
use App\Http\Controllers\riwayatController;
use App\Http\Controllers\tentangkamiController;

Route::get('/home', [homeController::class, 'index'] )->name('home');
Route::get('/posting', [postingController::class, 'index'] )->name('posting');
Route::post('/posting', [postingController::class,'posting']);
Route::get('/lombaterbaru', [lombaTerbaru::class, 'index'] )->name('lombaterbaru');
Route::get('/riwayat', [riwayatController::class, 'index'] )->name('riwayat');
Route::get('/penanda', [penandaController::class, 'index'] )->name('penanda');
Route::get('/tentangkami', [tentangkamiController::class, 'index'] )->name('tentangkami');
Route::get('/', [loginController::class, 'index'])->name('login');
Route::post('/', [loginController::class, 'login']);
Route::get('/daftar', [daftarController::class, 'index'])->name('daftar');
Route::post('/daftar', [daftarController::class, 'daftar']);
Route::get('/adminpage', [adminController::class, 'index'])->name('admin');
// Route::get('/postingan/{id}/approve', [adminController::class, 'approve'])->name('postingan.approve');
Route::post('/postingan/{id}/approve', [adminController::class, 'approve'])->name('postingan.approve');
// Route::get('/postingan/{id}/reject', [adminController::class, 'reject'])->name('postingan.reject');
Route::post('/postingan/{id}/reject', [adminController::class, 'reject'])->name('postingan.reject');

