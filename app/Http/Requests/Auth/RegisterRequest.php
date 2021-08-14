<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['name' => "string", 'username' => "string", 'email' => "string", 'password' => "string"])] public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username|alpha_dash',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255'
        ];
    }
}
