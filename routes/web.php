<?php

use Illuminate\Support\Facades\Route;
//komplain
use App\Http\Controllers\KomplainController;
//dokumentasi
use App\Http\Controllers\DokumentasiController;
//rt
use App\Http\Controllers\RT_Dashboardcontoller;


Route::view('/', 'welcome');

Route::middleware(['auth', 'verified', 'rw'])->prefix('rw')->group(function () {
    Route::get('/', function () {
        

        return view('rw.index', ['type_menu' => '/dashboard']);
    })->name('rw');


    Route::post('dokumentasi/storefoto', [DokumentasiController::class, 'storefoto'])->name('dokumentasi.storefoto');


    Route::post('/file', [DokumentasiController::class, 'store'])->name('dokumentasi.store');


    Route::put('komplain/ubahstatus/{id}',[KomplainController::class,'ubahstatus'])->name('komplain.ubahstatus');
    
    Route::get('komplain/diterima', [KomplainController::class, 'diterima'])->name('komplain.diterima');
    Route::get('komplain/diproses', [KomplainController::class, 'diproses'])->name('komplain.diproses');
    Route::get('komplain/selesai', [KomplainController::class, 'selesai'])->name('komplain.selesai');

    Route::resource('kartu-keluarga', \App\Http\Controllers\KartuKeluargaController::class);
    Route::resource('komplain', \App\Http\Controllers\KomplainController::class);
    Route::resource('penduduk', \App\Http\Controllers\PendudukController::class);
    Route::resource('dokumentasi', \App\Http\Controllers\DokumentasiController::class);
    Route::resource('pengumuman', \App\Http\Controllers\PengumumanController::class);
    
});

Route::middleware(['auth', 'verified','rt'])->group(function () {


    Route::resource('rt_dashboard', \App\Http\Controllers\RT_Dashboardcontoller::class);
    
    Route::resource('rt_penduduk', \App\Http\Controllers\RT_PendudukController ::class);

    Route::get('/rt', [RT_Dashboardcontoller::class, 'index'])->name('rt_dashboaard.index');
    


    

});


Route::middleware(['auth', 'verified','masyarakat'])->group(function () {
    Route::get('/masyarakat', function () {
        return view('masyarakat.index');
    })->name('masyarakat');
});



require __DIR__.'/auth.php';
