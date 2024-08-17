<?php
/* routes\api.php */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AkomplainController;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
 
    Route::prefix('user')->group(function () {

        // Rute detail user
        Route::get('/detail', [DetailController::class, 'detail']);

        // Rute komplain user
        Route::get('/komplain', [AkomplainController::class, 'riwayat']);
    });


    // Route::get('/user', [DetailController::class, 'detail']);

});