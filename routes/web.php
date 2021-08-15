<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use MailchimpMarketing\ApiClient;

Route::get('ping', function () {
    $client = new ApiClient();

    $client->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us5'
    ]);

    $client->lists->deleteListMemberPermanent('4d1c092209', "7bdfd65cc200ff5c38b875e637f75000");
    $allMembers = $client->lists->getListMembersInfo('4d1c092209');
    dd($allMembers);
});

//static pages
Route::get('/', [PagesController::class, 'welcome']);

//posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts/{post}/comments', [PostCommentsController::class, 'store'])->middleware('Auth');

//register
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

//login
Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'destroy'])->middleware('Auth');
