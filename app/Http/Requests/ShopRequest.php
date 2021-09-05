<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
        $status = '';

        if ($this->method() == 'PUT')
        {
            $name = 'required|unique:shops,name,'. $this->get('id');
            $status = 'required';
            
        } else {
            $name = 'required|unique:shops,name';
        }
        return [
            'name' => $name,
            'status' => $status,
        ];
    }
}
