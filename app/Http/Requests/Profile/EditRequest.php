<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'nullable|email|unique:users,email,' . $this->id,
            'username' => 'required|min:4|unique:users,username,' . $this->id,
            'phone' => 'required|min:10|unique:users,phone,' . $this->id,
            'address' => 'required|min:6',
            'dob' => 'nullable|date'
        ];
    }
}
