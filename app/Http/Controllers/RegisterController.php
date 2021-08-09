<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RegisterController extends Controller
{
    public function create(): Factory|View|Response|bool|Application
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = $this->validate(request(), [
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:7'
        ]);

        User::create($attributes);

        return redirect('/posts');
    }
}
