<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LaporanController;

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/search', [SearchController::class, 'index'])->name('search');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // BUKU
    Route::get('/buku/export', [BukuController::class, 'export'])
        ->name('buku.export');
    Route::get('/buku/search', [BukuController::class, 'search'])
        ->name('buku.search');
    Route::post('/buku/bulk-delete', [BukuController::class, 'bulkDelete'])
        ->name('buku.bulk-delete');
    Route::get('buku/kategori/{kategori}', [BukuController::class, 'filterKategori'])
        ->name('buku.kategori');
    Route::resource('buku', BukuController::class);

    // ANGGOTA
    Route::get('/anggota/export', [AnggotaController::class, 'export'])
        ->name('anggota.export');
    Route::get('/anggota/search', [AnggotaController::class, 'search'])
        ->name('anggota.search');
    Route::resource('anggota', AnggotaController::class);

    // KATEGORI
    Route::get('/kategori', [KategoriController::class, 'index'])
        ->name('kategori.index');
    Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search'])
        ->name('kategori.search');
    Route::get('/kategori/{id}', [KategoriController::class, 'show'])
        ->name('kategori.show');

    // TRANSAKSI

    // Pengembalian
    Route::put('/transaksi/{id}/kembalikan', [TransaksiController::class, 'kembalikan'])
        ->name('transaksi.kembalikan');

    // Resource
    Route::resource('transaksi', TransaksiController::class);

    //LAPORAN
    Route::get('/laporan', [LaporanController::class, 'index'])
    ->name('laporan.index');
});

require __DIR__ . '/auth.php';
