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
use App\Http\Controllers\daftarlombaController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\PembayaranController;


Route::get('/home', [homeController::class, 'index'] )->name('home');

Route::middleware(['auth'])->group(function () {
Route::get('/posting', [postingController::class, 'index'] )->name('posting');
Route::post('/posting', [postingController::class,'posting']);
Route::get('/posting/preview/{id}', [PostingController::class, 'preview'])->name('posting.preview');
Route::post('/posting/verifikasi/{id}', [PostingController::class, 'verifikasi'])->name('posting.verifikasi');
Route::get('/riwayat', [riwayatController::class, 'index'])->name('riwayat');
Route::get('/bayar/{id}', [PembayaranController::class, 'form'])->name('pembayaran.form');


// Route::get('/lombaterbaru', [lombaTerbaru::class, 'index'] )->name('lombaterbaru');
});


Route::get('/adminpage', [adminController::class, 'index'])->name('admin');
Route::post('/postingan/{id}/approve', [adminController::class, 'approve'])->name('postingan.approve');
Route::post('/postingan/{id}/reject', [adminController::class, 'reject'])->name('postingan.reject');
Route::get('/admin/preview/{id}', [AdminController::class, 'previewadmin'])->name('admin.preview');




Route::post('/checkout-final', [daftarlombaController::class, 'store'])->name('checkout.final'); // action form
Route::get('/checkout/{id}', [daftarlombaController::class, 'show'])->name('checkout.show');
Route::post('/checkout-preview', [daftarlombaController::class, 'preview'])->name('checkout.preview');
// Route::post('/checkout/{id}', [checkoutController::class, 'show'])->name('checkout');
Route::get('/lomba/{id}', [lombaterbaru::class, 'show'])->name('lombaterbaru');
Route::get('/daftarlomba/{id}', [daftarlombaController::class, 'show'])->name('daftarlomba');
// Route::get('/daftarlomba/{id}', [daftarlombaController::class, 'store'])->name('daftar.lomba');
Route::get('/riwayat', [riwayatController::class, 'index'] )->name('riwayat');
Route::get('/penanda', [penandaController::class, 'index'] )->name('penanda');
Route::get('/tentangkami', [tentangkamiController::class, 'index'] )->name('tentangkami');
Route::get('/', [loginController::class, 'index'])->name('login');
Route::post('/', [loginController::class, 'login']);
Route::get('/daftar', [daftarController::class, 'index'])->name('daftar');
Route::post('/daftar', [daftarController::class, 'daftar']);
Route::get('/adminpage', [adminController::class, 'index'])->name('admin');
// Route::get('/postingan/{id}/approve', [adminController::class, 'approve'])->name('postingan.approve');
// Route::post('/postingan/{id}/approve', [adminController::class, 'approve'])->name('postingan.approve');
// // Route::get('/postingan/{id}/reject', [adminController::class, 'reject'])->name('postingan.reject');
// Route::post('/postingan/{id}/reject', [adminController::class, 'reject'])->name('postingan.reject');

