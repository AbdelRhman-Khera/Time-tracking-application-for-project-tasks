<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('home'));
});

Auth::routes();

Route::middleware('admin')->group(function () {

    Route::resource('projects', App\Http\Controllers\ProjectController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/addtimemanual/{id}', [App\Http\Controllers\TrackController::class, 'manual'])->name('addtimemanual');
    Route::post('/addtime/{id}', [App\Http\Controllers\TrackController::class, 'addtime'])->name('addtime');
    Route::resource('tracks', App\Http\Controllers\TrackController::class)->only('destroy');
    Route::resource('projects', App\Http\Controllers\ProjectController::class)->only('show');
});
