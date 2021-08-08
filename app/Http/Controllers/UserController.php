<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('posts');
        return view('user', compact('user'));
    }
}
