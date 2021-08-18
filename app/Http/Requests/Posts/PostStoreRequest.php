<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['title' => "string", 'description' => "string", 'body' => "string", 'thumbnail' => "string", 'slug' => "string", 'category_id' => "string"])]
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|image',
            'slug' => 'required|alpha_dash|unique:posts,slug',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
