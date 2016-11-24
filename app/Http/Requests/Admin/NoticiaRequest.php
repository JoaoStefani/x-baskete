<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest {

	/**
	 * Obter as regras de validação para esta requisição.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'titulo' => 'required|min:3',
			'introducao' => 'required|min:10',
            'conteudo' => 'required|min:20',
		];
	}

	/**
	 * Determinar se o usuário está autorizado a fazer esta requisição.
	 *
	 * @return bool
	 */

	public function messages()
	{
		return [
			'titulo.required' => 'O campo título é requerido.',
			'introducao.required' => 'O campo introducao é requerido.',
			'conteudo.required' => 'O campo conteúdo é requerido.',

			'introducao.min' => 'O campo introducao precisa ter no mínimo dez caracteres.',
			'conteudo.min' => 'O campo conteúdo precisa ter no mínimo vinte caracteres.'
		];
	}

	public function authorize()
	{
		return true;
	}

}
