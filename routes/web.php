<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/berita/{id}', [FrontendController::class, 'show'])->name('berita.detail');

Route::get('/jalankan-migrasi', function () {
    try {
        $sqlPath = database_path('web_konveksi.sql');
        
        if (!file_exists($sqlPath)) {
            return 'Gagal: File web_konveksi.sql tidak ditemukan di folder database!';
        }

        // 1. Matikan foreign key & ratakan semua tabel sampai kosong total
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Schema::dropAllTables();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // 2. Jalankan import file SQL bawaan Anda secara bersih
        $sql = file_get_contents($sqlPath);
        DB::unprepared($sql);

        return 'Luar biasa! Database dikosongkan total dan semua data dari file SQL sukses dimasukkan ke Aiven MySQL.';
    } catch (\Exception $e) {
        return 'Gagal import SQL: ' . $e->getMessage();
    }
});