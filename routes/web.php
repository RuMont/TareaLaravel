<?php

use App\Http\Controllers\AdminCentresController;
use App\Http\Controllers\AdminChecksController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\ChecksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;

// Actualización de datos
Route::post('checks/insert', [ChecksController::class, 'store']);
Route::post('checks/update/{id}', [ChecksController::class, 'update']);
Route::post('usuarios/insert', [UsersController::class, 'store']);

// Rutas de autenticación
Route::controller(LoginController::class)->group(function () {
    Route::post('/auth', 'authenticate');
    Route::middleware('auth')->get('/logout', 'logout');
});

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

Route::middleware('auth')->get(
    '/edittable',
    [CentroController::class, 'index']
)->name('edit');

Route::middleware('auth')->get(
    '/readtable',
    [ChecksController::class, 'index']
)->name('readtable');

// Rutas de admin (accesible solo para admins)
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Rutas de admin_checks
    Route::controller(AdminChecksController::class)->prefix('admin')->group(function () {
        Route::get('/checks', 'index')->name('admin_checks');
        Route::post('/checks/insert', 'store');
        Route::get('/checks/edit/{id}', 'edit')->name('admin_checks_edit');
        Route::post('/checks/update/{id}', 'update');
        Route::get('/checks/delete/{id}', 'destroy');
    });

    // Rutas de admin_users
    Route::controller(AdminUsersController::class)->prefix('admin')->group(function () {
        Route::get('/users', 'index')->name('admin_users');
        Route::post('/users/insert', 'store');
        Route::get('/users/edit/{id}', 'edit')->name('admin_users_edit');
        Route::post('/users/update/{id}', 'update');
        Route::get('/users/delete/{id}', 'destroy');
    });

    // Rutas de admin_centres
    Route::controller(AdminCentresController::class)->prefix('admin')->group(function () {
        Route::get('/centres', 'index')->name('admin_centres');
        Route::post('/centres/insert', 'store');
        Route::get('/centres/edit/{id}', 'edit')->name('admin_centres_edit');
        Route::post('/centres/update/{id}', 'update');
        Route::get('/centres/delete/{id}', 'destroy');
    });
});
