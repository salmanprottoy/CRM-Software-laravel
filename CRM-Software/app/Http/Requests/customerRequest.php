<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class customerRequest extends FormRequest
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
            //
            'customerName'          => 'required',
            'customerContactNumber' => 'required|numeric|digits:11',
            'customerAddress'       => 'required',
            'customerEmail'         => 'required|email',
            'customerStatus'        => 'required',
            'customerGender'        => 'required'
        ];
    }
}
