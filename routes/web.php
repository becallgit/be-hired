<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProjectController;
Route::get('/', function () {
    return view('auth.login');
});



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/log-in', [AuthController::class, 'login'])->name('login.custom'); 
Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/personal/form/{id?}', [PersonalController::class, 'form'])->name('personal.form');
Route::post('/personal/save', [PersonalController::class, 'save'])->name('personal.save');

Route::get('/project/form', [ProjectController::class, 'form'])->name('project.form');
Route::post('/project/save', [ProjectController::class, 'save'])->name('project.save');