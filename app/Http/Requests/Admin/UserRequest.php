<?php namespace App\Http\Requests\Admin;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {

	/**
	 * Obter as regras de validação para esta requisição.
	 *
	 * @return array
	 */
	public function rules()
	{
		if($this->segment(3)!="") {
			$user = User::find($this->segment(3));
		}

		switch($this->method())
		{
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return [
					'name' => 'required|min:3',
					'email' => 'required|email|unique:users,email',
					'password' => 'required',
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'name' => 'required|min:3',
					'email' => 'required|email|unique:users,email,'.$user->id,
				];
			}
			default:break;
		}
	}

	/**
	 * Determinar se o usuário está autorizado a fazer esta requisição.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
