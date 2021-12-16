<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', function (Request $request) {

    if(User::query()->where('email',$request->json('email'))->exists()) {
        return response()->json([
            'message' => 'User Already exists',
            'status' => false
        ],422);
    }
    $user = User::query()->create([
        'name' => $request->json('name'),
        'email' => $request->json('email'),
        'password' => Hash::make($request->json('password')),
    ]);

    return response()->json([
        'message' => 'Successfully Registered',
        'user' => $user,
        'status' => true
    ],200);
});

