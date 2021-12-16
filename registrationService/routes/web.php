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
    return view('welcome');
});

Route::get('/test', function () {
    $users =  \App\Models\User::query()->get();

    $final = $users->each(function ($q) {
        unset($q->id);
        unset($q->created_at);
        unset($q->updated_at);
    });


    \App\Models\User::query()->insert($final->toArray());

    return \App\Models\User::query()->get();
});
