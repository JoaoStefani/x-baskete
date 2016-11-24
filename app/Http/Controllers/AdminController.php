<?php namespace App\Http\Controllers;

class AdminController extends Controller {

    /**
     *Inicializador.
     *
     * @return \AdminController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

}