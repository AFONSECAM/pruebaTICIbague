<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
//route login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');



Route::middleware(['auth'])->group(function(){
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'process']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('employee', EmployeeController::class);
    Route::resource('department', DepartmentController::class);
    // Ruta para mostrar el formulario de edición de perfil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    // Ruta para manejar la actualización del perfil
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
