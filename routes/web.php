<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/berita/{id}', [FrontendController::class, 'show'])->name('berita.detail');

Route::get('/jalankan-migrasi', function () {
    try {
        // Kita ubah 'migrate' menjadi 'migrate:fresh' untuk membersihkan dan mengulang semua tabel
        Artisan::call('migrate:fresh', ['--force' => true]);
        return 'Sip! Semua tabel database berhasil di-reset dan dibuat ulang di Aiven MySQL.';
    } catch (\Exception $e) {
        return 'Gagal migrasi: ' . $e->getMessage();
    }
});