<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function welcome()
    {
        return view('static.welcome');
    }
}
