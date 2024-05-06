<?php

use Illuminate\Support\Facades\Route;
//komplain
use App\Http\Controllers\KomplainController;


Route::view('/', 'welcome');

Route::middleware(['auth', 'verified', 'rw'])->prefix('rw')->group(function () {
    Route::get('/', function () {
        
        return view('rw.index', ['type_menu' => '/dashboard']);
    })->name('rw');

    Route::put('komplain/ubahstatus/{id}',[KomplainController::class,'ubahstatus'])->name('komplain.ubahstatus');


    //data komplain
    // Route::post('komplain/ubahstatus', [KomplainController::class, 'ubahstatus'])->name('komplain.ubahstatus');
    // Route::put('/kategori/update_save/{id}', [KategoriController::class, 'update_save'])->name('kategori.update_save');


    
    Route::get('komplain/diterima', [KomplainController::class, 'diterima'])->name('komplain.diterima');
    Route::get('komplain/diproses', [KomplainController::class, 'diproses'])->name('komplain.diproses');
    Route::get('komplain/selesai', [KomplainController::class, 'selesai'])->name('komplain.selesai');


    // Route::get('/kartu-keluarga', [KartuKeluargaController::class, 'index'])->name('rw.kartu-keluarga');

    Route::resource('kartu-keluarga', \App\Http\Controllers\KartuKeluargaController::class);
    Route::resource('komplain', \App\Http\Controllers\KomplainController::class);
    Route::resource('penduduk', \App\Http\Controllers\PendudukController::class);
    

    

});

Route::middleware(['auth', 'verified','rt'])->group(function () {
    Route::get('/rt', function () {
        return view('rt.index');
    })->name('rt');
});


Route::middleware(['auth', 'verified','masyarakat'])->group(function () {
    Route::get('/masyarakat', function () {
        return view('masyarakat.index');
    })->name('masyarakat');
});



// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

require __DIR__.'/auth.php';
