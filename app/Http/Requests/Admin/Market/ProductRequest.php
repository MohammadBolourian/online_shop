<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if($this->isMethod('post')) {
            return [
                'title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'inventory' => 'required',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'categories' => 'required',
                  'attributes' => 'array'
            ];
        }
        else{
            return [
                'title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'inventory' => 'required',
                'categories' => 'required'
            ];
        }
    }
}
