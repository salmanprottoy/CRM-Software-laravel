<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'productCode' => 'required',
            'productName' => 'required',
            'productVendor'=>'required',
            'quantityInStock'=> 'required|numeric',
            'buyPrice' => 'required|numeric',
            'sellPrice' => 'required|numeric',
            'productDescription' => 'required'
        ];
    }
}
