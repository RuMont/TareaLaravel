<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\ChecksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;

// //Obtiene las filas de la db
// Route::get('centros',[CentroController::class, 'index']);
// //Inserta elemento nuevo
// Route::post('centros/insert',[CentroController::class, 'store']);
// //Lleva al form de actualización
// Route::get('centros/edit/{id}',[CentroController::class, 'edit']);
// //Actualiza un elemento pasado por id
// Route::post('centros/update/{id}',[CentroController::class, 'update']);
// //Borra un elemento pasado por id
// Route::get('centros/delete/{id}',[CentroController::class, 'destroy']);


// Route::get('checks',[ChecksController::class, 'index']);
// //Inserta elemento nuevo
Route::post('checks/insert',[ChecksController::class, 'store']);
// //Lleva al form de actualización
Route::post('checks/update/{id}',[ChecksController::class, 'update']);
// //Borra un elemento pasado por id
// Route::get('checks/delete/{id}',[ChecksController::class, 'destroy']);


// Route::get('usuarios',[UsersController::class, 'index']);
// //Inserta elemento nuevo
Route::post('usuarios/insert',[UsersController::class, 'store']);
// //Lleva al form de actualización
// Route::get('usuarios/edit/{id}',[UsersController::class, 'edit']);
// //Actualiza un elemento pasado por id
// Route::post('usuarios/update/{id}',[UsersController::class, 'update']);
// //Borra un elemento pasado por id
// Route::get('usuarios/delete/{id}',[UsersController::class, 'destroy']);

Route::post('/auth',[LoginController::class, 'authenticate']);
Route::get('/logout',[LoginController::class, 'logout']);


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->get('/edittable', [CentroController::class, 'index']
)->name('edit');

Route::middleware('auth')->get('/readtable', [ChecksController::class, 'index']
)->name('readtable');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');
