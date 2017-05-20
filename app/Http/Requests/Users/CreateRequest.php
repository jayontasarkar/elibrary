<?php

namespace App\Http\Requests\Users;

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
            'name' => 'required|string|min:3|max:20',
            'code' => 'nullable|string|unique:users,code',
            'username' => 'required|string|min:4|max:20|unique:users,username',
            'phone' => 'required|string',
            'address' => 'required|min:4',
            'gender' => 'required|string',
            'password' => 'required|min:4|confirmed',
            'dob'  => 'nullable|date'
        ];
    }
}
