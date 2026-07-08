<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/berita/{id}', [FrontendController::class, 'show'])->name('berita.detail');

Route::get('/jalankan-migrasi', function () {
    try {
        $sqlPath = database_path('web_konveksi.sql');
        
        if (!file_exists($sqlPath)) {
            return 'Gagal: File web_konveksi.sql tidak ditemukan di root folder!';
        }

        $sql = file_get_contents($sqlPath);
        DB::unprepared($sql);

        return 'Luar biasa! Semua tabel dan data dari file SQL berhasil dimasukkan ke Aiven MySQL.';
    } catch (\Exception $e) {
        return 'Gagal import SQL: ' . $e->getMessage();
    }
});