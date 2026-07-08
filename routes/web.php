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
            return 'Gagal: File web_konveksi.sql tidak ditemukan di folder database!';
        }

        // Matikan pengecekan foreign key agar bisa menghapus tabel dengan bersih tanpa error restraint
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // Ambil daftar semua tabel yang ada di database saat ini
        $tables = DB::select('SHOW TABLES');
        $dbName = 'Tables_in_' . env('DB_DATABASE', 'defaultdb');

        // Hapus paksa semua tabel yang tersisa di database
        foreach ($tables as $table) {
            DB::statement('DROP TABLE IF EXISTS ' . $table->$dbName);
        }

        // Jalankan import file SQL bawaan Anda secara bersih
        $sql = file_get_contents($sqlPath);
        DB::unprepared($sql);

        // Nyalakan kembali pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        return 'Luar biasa! Database berhasil dikosongkan total dan semua data dari file SQL sukses dimasukkan.';
    } catch (\Exception $e) {
        // Pastikan foreign key dinyalakan lagi jika gagal di tengah jalan
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        return 'Gagal import SQL: ' . $e->getMessage();
    }
});