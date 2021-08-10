<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
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

    public function store(RegisterRequest $request)
    {
        User::create($request->validated());
        return redirect('/posts');
    }
}
