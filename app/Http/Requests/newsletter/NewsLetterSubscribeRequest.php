<?php

namespace App\Http\Requests\newsletter;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class NewsLetterSubscribeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // everyone can sign up for the newsletter no matter if they are logged in or not
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['email' => "string"])]
    public function rules(): array
    {
        return [
            'email' => 'required|email'
        ];
    }
}
