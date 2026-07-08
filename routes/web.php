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
            return 'Gagal: File web_konveksi.sql tidak ditemukan!';
        }

        // 1. Matikan aturan Primary Key dan Foreign Key
        DB::statement('SET sql_require_primary_key = 0;');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        
        // 2. Kosongkan database
        Schema::dropAllTables();

        // 3. Jalankan import SQL
        $sql = file_get_contents($sqlPath);
        DB::unprepared($sql);

        // 4. Buat Link Storage (PENTING)
        \Illuminate\Support\Facades\Artisan::call('storage:link');

        // 5. Nyalakan kembali aturan
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        DB::statement('SET sql_require_primary_key = 1;');

        return 'Berhasil! Database diimpor dan Storage Link dibuat.';
    } catch (\Exception $e) {
        return 'Gagal: ' . $e->getMessage();
    }
});