<?php

namespace App\Http\Controllers;

use App\Http\Requests\newsletter\NewsLetterSubscribeRequest;
use App\Services\NewsLetterService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class NewsLetterController extends Controller
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(NewsLetterSubscribeRequest $subscribeRequest, NewsLetterService $newsletter): RedirectResponse
    {
        $attributes = $subscribeRequest->validated();

        try {
            $newsletter->subscribe($attributes['email']);
        } catch (Exception) {
            throw ValidationException::withMessages(["email" => "This email can't be added too the newsletter."]);
        }

        return back()->with('success', 'You are now signed up for our newsletter');
    }
}
