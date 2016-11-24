<?php

namespace App\Http\Controllers;

use App\Noticia;

class NoticiasController extends Controller {

    public function index()
    {
        $noticias = Noticia::paginate(5);
        $noticias->setPath('noticias/');

        return view('noticias.index', compact('noticias'));
    }

	public function show($slug)
	{
		$noticia = Noticia::findBySlugOrId($slug);

		return view('noticia.view', compact('noticia'));
	}

}
