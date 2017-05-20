<?php

namespace App\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'isbn' => 'required|min:3|unique:books,isbn',
            'title' => 'required|min:3|unique:books,title',
            'author_id' => 'required|numeric|exists:authors,id',
            'category_id' => 'required|numeric|exists:categories,id',
            'location' => 'required|min:3',
            'total_copy'  => 'required|numeric|min:0',
            'available_copy'  => 'required|numeric|min:0',
        ];
    }
}
