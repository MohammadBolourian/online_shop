<?php

namespace App\Http\Requests\Admin\Custom;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
                'name' => 'required|max:120|min:1',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',

            ];
        }
        else{
            return [
                'name' => 'required|max:120|min:1',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
            ];
        }
    }
}
