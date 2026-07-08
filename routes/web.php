<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// Rute Halaman Depan
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/berita/{id}', [FrontendController::class, 'show'])->name('berita.detail');

// Rute untuk menampilkan gambar dari storage (Fallback agar gambar muncul)
Route::get('/storage/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/public/' . $folder . '/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
})->where('folder', 'galleries|organizations');

// Rute Migrasi (Jalankan ini sekali setelah deploy)
Route::get('/jalankan-migrasi', function () {
    try {
        $sqlPath = database_path('web_konveksi.sql');
        
        if (!file_exists($sqlPath)) {
            return 'Gagal: File web_konveksi.sql tidak ditemukan!';
        }

        // 1. Matikan aturan database sementara
        DB::statement('SET sql_require_primary_key = 0;');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        
        // 2. Kosongkan database
        Schema::dropAllTables();

        // 3. Jalankan import SQL
        $sql = file_get_contents($sqlPath);
        DB::unprepared($sql);

        // 4. Buat Link Storage (untuk jaga-jaga)
        Artisan::call('storage:link');

        // 5. Nyalakan kembali aturan database
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        DB::statement('SET sql_require_primary_key = 1;');

        return 'Berhasil! Database diimpor dan Storage Link dibuat.';
    } catch (\Exception $e) {
        return 'Gagal: ' . $e->getMessage();
    }
});