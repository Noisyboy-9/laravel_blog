<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;

class CommentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['body' => "string"])]
    public function rules(): array
    {
        return [
            'body' => 'required'
        ];
    }
}
