<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return view('start');
});

Route::get('/task-2', [TaskController::class, 'task2'])->name('task2');
Route::get('/task-4', [TaskController::class, 'task4'])->name('task4');

Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
Route::get('/user', [AuthController::class, 'userPage'])->name('userPage');


