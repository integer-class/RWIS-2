<?php

use Illuminate\Support\Facades\Route;
//komplain
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KomplainController;
//dokumentasi
use App\Http\Controllers\DokumentasiController;
//rt
use App\Http\Controllers\RT_Dashboardcontoller;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\RT_DokumentasiController;
//landing
use App\Http\Controllers\Landing_indexController;
//warga
use App\Http\Controllers\Warga_DashboardController;
//notif dashboard
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RT_PengumumanController;
//penduduk
use App\Http\Controllers\PendudukController;
//dashboard contoller
use App\Http\Controllers\DashboardController;
//pengumuman
use App\Http\Controllers\PengumumanController;
//arsip
//post landing pek
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LogoutController;




Route::get('/', [Landing_indexController::class, 'index'])->name('index');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


Route::get('/landing_dokumentasi', [Landing_indexController::class, 'dokumentasi'])->name('landing_dokumentasi');
Route::get('/aboutus', [Landing_indexController::class, 'aboutus'])->name('aboutus');
Route::get('/show/{id}', [Landing_indexController::class, 'show'])->name('show');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');


Route::middleware(['auth', 'verified', 'rw'])->prefix('rw')->group(function () {

Route::get('profile/{id}', [DashboardController::class, 'profile'])->name('profile');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::put('/komplain/{id_komplain}/ubahstatus', [KomplainController::class, 'ubahstatus'])->name('komplain.ubahstatus');
    Route::post('dokumentasi/storefoto', [DokumentasiController::class, 'storefoto'])->name('dokumentasi.storefoto');
    Route::post('/file', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
    Route::put('penduduk/arsip/{id}',[PendudukController::class,'arsip'])->name('penduduk.arsip');
    Route::put('pengumuman/arsip/{id}',[PengumumanController::class,'arsip'])->name('pengumuman.arsip');
    Route::put('dokumentasi/arsip/{id}',[DokumentasiController::class,'arsip'])->name('dokumentasi.arsip');
    
    //routing restore
    Route::put('penduduk/restore/{id}',[PendudukController::class,'restore'])->name('penduduk.restore');
    Route::put('pengumuman/restore/{id}',[PengumumanController::class,'restore'])->name('pengumuman.restore');
    Route::put('dokumentasi/restore/{id}',[DokumentasiController::class,'restore'])->name('dokumentasi.restore');

    //routing page arsip
   
    Route::get('arsip/pengumuman', [ArsipController::class,'pengumuman'])->name('arsip.pengumuman');
    Route::get('arsip/dokumentasi', [ArsipController::class, 'dokumentasi'])->name('arsip.dokumentasi');
 
    //routing page komplain
    Route::get('komplain/diterima', [KomplainController::class, 'diterima'])->name('komplain.diterima');
    Route::get('komplain/diproses', [KomplainController::class, 'diproses'])->name('komplain.diproses');
    Route::get('komplain/selesai', [KomplainController::class, 'selesai'])->name('komplain.selesai');
    

    //routing resource  
    Route::resource('kartu-keluarga', \App\Http\Controllers\KartuKeluargaController::class);
    Route::resource('komplain', \App\Http\Controllers\KomplainController::class);
    Route::resource('penduduk', \App\Http\Controllers\PendudukController::class);
    Route::resource('dokumentasi', \App\Http\Controllers\DokumentasiController::class);
    Route::resource('pengumuman', \App\Http\Controllers\PengumumanController::class);
    Route::resource('bansos', \App\Http\Controllers\BansosController::class);
    Route::resource('iuran', \App\Http\Controllers\IuranController::class);
    Route::resource('arsip', \App\Http\Controllers\ArsipController::class);
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
    Route::resource('warga_pengumuman', \App\Http\Controllers\Warga_PengumumanController::class);
    Route::resource('warga_dokumentasi', \App\Http\Controllers\Warga_DokumentasiController::class);
    
});



require __DIR__.'/auth.php';
