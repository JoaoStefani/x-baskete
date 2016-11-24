<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use \Alert;

class PagesController extends Controller {

	public function sobre()
	{
		return view('pages.sobre');
	}

	public function contato()
	{
		return view('pages.contato');
	}

	public function helpdesk(Request $request){
		\Mail::send('emails.contato', [
			'nome'       => $request->nome,
			'email'      => $request->email,
			'telefone'   => $request->telefone,
			'assunto'    => $request->assunto,
			'mensagem'   => $request->mensagem],
			function ($m) {
				$m->to(env('MAIL_ADMIN'), 'LARAVEL V5.1')->subject('HELP-DESK - LARAVEL V5.1');
			}
		);
		Alert::success('Email enviado com sucesso.')->autoclose(4000);
		return redirect('/');
	}

}
