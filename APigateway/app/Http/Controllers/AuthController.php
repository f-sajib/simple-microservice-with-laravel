<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\RegistrationService;

use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $registrationService;

    public function __construct(RegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function register(Request $request)
    {
        $inputs = $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);
        $response = $this->registrationService->registerUser($inputs);
        if($response['status']) {
            User::query()->create($response['user']);
        }
        return $response;

    }

    public function login(Request $request){

        $inputs = $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::query()->where('email',$inputs['email'])->first();

        try {
            if(! $token = JWTAuth::attempt($inputs)){
                return response()->json(['error'=>'invalid Credentials'], 400);
            }
        }catch (JWTException $e){
            return response()->json(['error'=>'Could not create token'], 500);
        }

        return response()->json([
            'user' => $user,
            'token' => $token
        ],200);
    }

    public function logout()
    {
        auth()->logout();
        return true;
    }

    public function registerPage()
    {
        return view('register');
    }

    public function loginPage()
    {
        return view('login');
    }

    public function userPage()
    {
        return view('user');
    }
}
