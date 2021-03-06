<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(): Factory|View|Response|bool|Application
    {
        return view('register.create');
    }

    public function store(RegisterRequest $request): Redirector|Application|RedirectResponse
    {
        $user = User::create($request->validated());

        Auth::login($user);

        return redirect('/posts')->with('success', 'Your account has been created.');
    }
}
