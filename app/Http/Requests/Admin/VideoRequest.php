<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest {

    public function rules()
    {
        return [
            'link' => 'required|min:3',
        ];
    }

    public function authorize()
    {
        return true;
    }

}
