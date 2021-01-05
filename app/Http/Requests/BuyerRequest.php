<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerRequest extends FormRequest
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
            'buyerName'  => 'required|min:4',
            'buyerAddress' => 'required',
            'buyerContactNumber' => 'required|numeric|digits:11',
            'productCode' => 'required',
            //'customerStatus' => 'required',
            'productQuantity'=>'required'
        ];
    } 
}
