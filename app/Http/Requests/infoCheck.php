<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class infoCheck extends FormRequest
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
            'username' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
            'designation' => 'required',
            'phone' => 'required|min:9'
        ];
    }
    public function messages(){
        return [
            'username.required'=> "username can't left empty....",
            'email.required'=> "email can't left empty....",
            'phone.required'=> "phone can't left empty....",
            'phone.min'=>"phone number must be greater then 8 digits"
        ];
    }
}
