<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return User::with(request('with', []))
            ->Search(request('query'))
            ->orderBy(request('sort', 'name'), request('order', 'asc'))
            ->simplePaginate(request('limit'));
    }

    public function show(User $user)
    {
        return $user->load(request('with',[]));
    }
}
