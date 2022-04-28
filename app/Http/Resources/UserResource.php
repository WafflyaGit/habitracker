<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var User $user */
        $user = $this->resource;

        return collect($user)->merge([
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
        ]);
    }
}
