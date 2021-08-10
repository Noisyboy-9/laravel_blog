<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function destroy()
    {
        Auth::logout();
        return redirect(RouteServiceProvider::HOME)->with('success', 'Goodbye!');
    }
}
