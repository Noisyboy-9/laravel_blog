<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create(): Factory|View|Response|bool|Application
    {
        return view('login.create');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(LoginRequest $loginRequest): Redirector|Application|RedirectResponse
    {
        $credentials = $loginRequest->validated();

        if (!auth()->attempt($credentials)) {
//        auth failed.
            throw ValidationException::withMessages(
                ['email' => "Your provided credentials couldn't be verified"]
            );
        }

//            auth success, redirect to homepage
        session()->regenerate();
        return redirect(RouteServiceProvider::HOME)->with('success', 'Welcome Back!');
    }
}
