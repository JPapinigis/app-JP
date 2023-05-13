<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferencesController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('web')->group(function () {

    //authentication
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //conference routes
    Route::get('/conferences', [ConferencesController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/create', [ConferencesController::class, 'create'])->name('conferences.create');
    Route::get('/conferences/{id}/edit', [ConferencesController::class, 'edit'])->name('conferences.edit');
    Route::post('/conferences', [ConferencesController::class, 'store'])->name('conferences.store');
    Route::put('/conferences/{id}', [ConferencesController::class, 'update'])->name('conferences.update');
    Route::delete('/conferences/{id}', [ConferencesController::class, 'destroy'])->name('conferences.destroy');


});



