<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TipoCardapioRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'nome' => 'required',
		];
	}

	 public function messages()
    {
        return [
            'nome.required' => 'Nome é requerido.',
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