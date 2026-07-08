<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/berita/{id}', [FrontendController::class, 'show'])->name('berita.detail');

Route::get('/jalankan-migrasi', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return 'Sip! Semua tabel database berhasil dibuat di Aiven MySQL.';
    } catch (\Exception $e) {
        return 'Gagal migrasi: ' . $e->getMessage();
    }
});