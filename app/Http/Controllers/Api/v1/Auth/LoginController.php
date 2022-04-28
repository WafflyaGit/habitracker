<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->input('remember_me'))) {
            return Auth::user()->createToken(env('APP_NAME'))->accessToken;
        }

        return ValidationException::withMessages(['email' => 'Credentials are not valid']);
    }
}
