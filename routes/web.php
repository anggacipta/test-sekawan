<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PengendaraController;
use App\Http\Controllers\PersetujuanController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function (){
    Route::get('/dashboard', [PersetujuanController::class, 'dashboard']);

    // Route Kendaraan
    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
    Route::get('/kendaraan-tambah', [KendaraanController::class, 'getTambah'])->name('kendaraan.tambah');
    Route::get('/kendaraan-edit/{id}', [KendaraanController::class, 'getEdit'])->name('kendaraan.edit');
    Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('kendaraan.store');
    Route::put('/kendaraan-update', [KendaraanController::class, 'update'])->name('kendaraan.update');
    Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');

    // Route Pengendara
    Route::get('/pengendara', [PengendaraController::class, 'index'])->name('pengendara.index');
    Route::get('/pengendara-tambah', [PengendaraController::class, 'getTambah'])->name('pengendara.tambah');
    Route::get('/pengendara-edit/{id}', [PengendaraController::class, 'getEdit'])->name('pengendara.edit');
    Route::post('/pengendara', [PengendaraController::class, 'store'])->name('pengendara.store');
    Route::put('/pengendara-update', [PengendaraController::class, 'update'])->name('pengendara.update');
    Route::delete('/pengendara', [PengendaraController::class, 'destroy'])->name('pengendara.destroy');

    // Route Pemesanan
    Route::get('/pemesanan', [PersetujuanController::class, 'index'])->name('pemesanan.index');
    Route::get('/pemesanan-tambah', [PersetujuanController::class, 'getTambah'])->name('pemesanan.tambah');
    Route::post('/pemesanan', [PersetujuanController::class, 'store'])->name('pemesanan.store');
    Route::put('/pemesanan-setuju-admin/{id}', [PersetujuanController::class, 'setujuAdmin'])->name('pemesanan.setuju.admin');
    Route::patch('/pemesanan-tidaksetuju-admin/{id}', [PersetujuanController::class, 'tidaksetujuAdmin'])->name('pemesanan.tidaksetuju.admin');
    Route::get('/export-excel', [PersetujuanController::class, 'export'])->name('pemesanan.export');
});

Route::middleware(['auth', 'role:atasan'])->group(function (){
    Route::get('/atasan/dashboard', [PersetujuanController::class, 'dashboard']);

    // Route Pemesanan
    Route::get('/export-excel/atasan', [PersetujuanController::class, 'export'])->name('pemesanan.export.atasan');
    Route::get('/pemesanan/atasan', [PersetujuanController::class, 'indexAtasan'])->name('pemesanan.index.atasan');
    Route::patch('/pemesanan-setuju-atasan/{id}', [PersetujuanController::class, 'setujuAtasan'])->name('pemesanan.setuju.atasan');
    Route::patch('/pemesanan-tidaksetuju-atasan/{id}', [PersetujuanController::class, 'tidaksetujuAtasan'])->name('pemesanan.tidaksetuju.atasan');
});


require __DIR__.'/auth.php';
