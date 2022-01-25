<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\ChecksController;
use App\Http\Controllers\UsersController;

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

Route::get('centros',[CentroController::class, 'index']);

Route::get('usuarios',[UsersController::class, 'index']);

Route::get('checks',[ChecksController::class, 'index']);

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/edittable', function () {
    return view('edittable');
})->name('edittable');

Route::get('/readtable', function () {
    return view('readtable');
})->name('readtable');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');
