<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferencesController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/conferences', [ConferencesController::class, 'index']);

Route::get('/conferences/create', 'ConferencesController@create');
Route::get('/conferences/{id}/edit', 'ConferencesController@edit');
Route::get('/conferences/{id}/delete', 'ConferencesController@delete');
Route::post('/conferences', 'ConferencesController@store');
Route::put('/conferences/{id}', 'ConferencesController@update');
Route::delete('/conferences/{id}', 'ConferencesController@destroy');
