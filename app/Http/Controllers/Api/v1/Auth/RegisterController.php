<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return UserResource
     */
    public function __invoke(RegisterRequest $request): UserResource
    {
        return new UserResource(User::create($request->validated()));
    }
}
