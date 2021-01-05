<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'customerName'  => 'required|min:4',
            'customerContactNumber' => 'required|numeric|digits:11',
            'customerAdress' => 'required',
            'customerEmail' => 'required|email',
            //'customerStatus' => 'required',
            'customerGender'=>'required'
        ];
    } 
}
