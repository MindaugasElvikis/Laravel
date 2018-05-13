<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class UsersController.
 */
class UsersController
{
    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function me()
    {
        return new \App\Http\Resources\User(Auth::user());
    }

    /**
     * @return mixed
     */
    public function listUsers()
    {
        return User::select(['id', 'name'])->get();
    }
}
