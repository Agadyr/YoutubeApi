<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return User::with('channel')->get();

    }

    public function show(User $user)
    {
        return $user->load('channel');
    }
}
