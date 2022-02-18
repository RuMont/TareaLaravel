<?php

use App\Http\Controllers\AdminChecksController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\ChecksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;

// Actualización de datos
Route::post('checks/insert',[ChecksController::class, 'store']);
Route::post('checks/update/{id}',[ChecksController::class, 'update']);
Route::post('usuarios/insert',[UsersController::class, 'store']);

// Rutas de autenticación
Route::post('/auth',[LoginController::class, 'authenticate']);
Route::middleware('auth')->get('/logout',[LoginController::class, 'logout']);

// Rutas generales
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware('auth')->get('/edittable', [CentroController::class, 'index']
)->name('edit');

Route::middleware('auth')->get('/readtable', [ChecksController::class, 'index']
)->name('readtable');

// Rutas de admin (accesible solo para admins)
Route::middleware('auth')->get('/admin',[AdminController::class, 'index']
)->name('admin');

// Rutas de admin_checks (accesibles solo para admins)
Route::middleware('auth')->get('/admin/checks',[AdminChecksController::class, 'index'])->name('admin_checks');
Route::middleware('auth')->post('/admin/checks/insert',[AdminChecksController::class, 'store']);
Route::middleware('auth')->get('/admin/checks/edit/{id}',[AdminChecksController::class, 'edit'])->name('admin_checks_edit');
Route::middleware('auth')->post('/admin/checks/update/{id}',[AdminChecksController::class, 'update']);
Route::middleware('auth')->get('/admin/checks/delete/{id}',[AdminChecksController::class, 'destroy']);