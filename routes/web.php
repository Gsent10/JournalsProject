<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalsController;

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


Route::get('/', [JournalsController::class, 'index']);

Route::get('/dash', [JournalsController::class, 'dashboard']);

Route::get('/journals', [JournalsController::class, 'allJournals']);

Route::get('/about', [JournalsController::class, 'about']);

Route::get('/admin', [JournalsController::class, 'admin']);

Route::post('/admin/create', [JournalsController::class, 'store']);

Route::post('/admin', [JournalsController::class, 'loadAll']);

Route::delete('/delete/{id}', [JournalsController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
