<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'localizacao' => 'required',
            'datainicio' => 'required',
            'datafinal' => 'required',
            'link' => 'required',
		];
	}

	 public function messages()
    {
        return [
            'localizacao.required' => 'A localização é requerido.',
            'datainicio.required' => 'A data inicio é requerido.',
            'datafinal.required' => 'A data final é requerido.',
            'link.required' => 'O link é requerido.'
        ];
    }


	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}