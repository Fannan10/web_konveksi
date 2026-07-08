<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// 1. Route Halaman Utama
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/berita/{id}', [FrontendController::class, 'show'])->name('berita.detail');

// 2. Route Khusus untuk Menampilkan Gambar (Solusi "Pintar" agar foto muncul)
// Ini menangkap permintaan gambar dan langsung mengambil dari folder storage
Route::get('/storage/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/public/' . $folder . '/' . $filename);
    
    if (!file_exists($path)) {
        // Jika file tidak ditemukan, coba cari di folder lain atau abort
        abort(404, 'File gambar tidak ditemukan di: ' . $path);
    }
    return response()->file($path);
})->where('folder', '.*');

// 3. Route Migrasi & Maintenance
Route::get('/jalankan-migrasi', function () {
    try {
        $sqlPath = database_path('web_konveksi.sql');
        if (!file_exists($sqlPath)) return 'Gagal: File SQL tidak ada!';

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Schema::dropAllTables();
        DB::unprepared(file_get_contents($sqlPath));
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // Mencoba membuat link (jika gagal tidak masalah karena route no. 2 sudah menghandle)
        Artisan::call('storage:link');

        return 'Berhasil! Database diimpor. Gambar akan diakses melalui route bypass.';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});