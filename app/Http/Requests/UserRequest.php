<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            //'image' => 'required|image',
            //'type'  => 'required',
            'username'  => 'required|min:4',
            'password' => 'required|min:4',
            'type' => 'required',
            'designation' => 'required',
            'contactNumber' => 'required|numeric|digits:11',
            'email' => 'required|email',
            'salary' => 'required|numeric'


            
        ];
    } 
}
