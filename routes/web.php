<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified','rw'])->group(function () {
    Route::get('/rw', function () {
        return view('rw.index');
    })->name('rw');

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
