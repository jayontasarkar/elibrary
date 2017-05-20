<?php

namespace App\Http\Requests\Members;

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
            'code' => 'required|string|min:4|max:10|unique:members,code,' . $this->id,
            'name' => 'required|string|min:3|max:20',
            'phone' => 'nullable|string|min:10|max:11|unique:members,phone,' . $this->id,
            'address' => 'required|min:4',
            'type'   => 'required|string',
            'gender'   => 'required|string',
            'avatar_image' => 'nullable|mimes:jpeg,jpg,png'
        ];
    }
}
