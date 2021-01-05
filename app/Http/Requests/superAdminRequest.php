<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class superAdminRequest extends FormRequest
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
            'image' => 'required|image',
            'type'  => 'required',
            'name'  => 'required|min:4',
            'username' => 'required|min:3',
            'mobile' => 'required|numeric|digits:11',
            'email' => 'required|email',
            'gender' => 'required',
            'address' => 'required'
        ];
    }
}
