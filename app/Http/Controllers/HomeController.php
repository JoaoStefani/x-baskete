<?php

namespace App\Http\Controllers;

use App\Noticia;
use DB;

class HomeController extends Controller {

	/**
	 *Mostrar o painel das aplicações para o usuário.
	 *
	 * @return Response
	 */
	public function index()
	{
		$noticias = Noticia::with('autor')
							->orderBy('created_at', 'DESC')
							->limit(4)
							->get();

		return view('pages.home', compact('noticias'));
	}

}