<?php

use Illuminate\Support\Facades\Route;
//komplain
use App\Http\Controllers\KomplainController;
//dokumentasi
use App\Http\Controllers\DokumentasiController;
//rt
use App\Http\Controllers\RT_Dashboardcontoller;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\RT_DokumentasiController;


//warga
use App\Http\Controllers\Warga_DashboardController;

//notif dashboard
use App\Http\Controllers\NotificationController;



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
    Route::resource('iuran', \App\Http\Controllers\IuranController::class);
    
    
});

Route::middleware(['auth', 'verified','rt'])->prefix('rt')->group(function () {


    Route::get('/', [RT_Dashboardcontoller::class, 'index'])->name('rt_dashboaard.index');
    Route::post('rt_dokumentasi/storefoto', [RT_DokumentasiController::class, 'storefoto'])->name('rt_dokumentasi.storefoto');



    Route::resource('rt_dashboard', \App\Http\Controllers\RT_Dashboardcontoller::class);
    
    Route::resource('rt_penduduk', \App\Http\Controllers\RT_PendudukController ::class);

    Route::resource('rt_kartukeluarga', \App\Http\Controllers\RT_KartuKeluargaController::class);

    Route::resource('rt_iuran', \App\Http\Controllers\RT_IuranController::class);
    Route::resource('rt_komplain', \App\Http\Controllers\RT_KomplainController::class);

    Route::resource('rt_pengumuman', \App\Http\Controllers\RT_PengumumanController::class);

    Route::resource('rt_dokumentasi', \App\Http\Controllers\RT_DokumentasiController::class);

    

});


Route::middleware(['auth', 'verified','masyarakat'])->prefix('warga')->group(function () {

    Route::resource('warga_dashboard', \App\Http\Controllers\Warga_DashboardController::class);
    Route::resource('warga_komplain', \App\Http\Controllers\Warga_KomplainController::class);

});

Route::get('/notifications', [NotificationController::class, 'getLatestActivities']);








require __DIR__.'/auth.php';
