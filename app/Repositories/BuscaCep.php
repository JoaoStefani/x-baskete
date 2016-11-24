<?php

namespace App\Http\Controllers;

use Correios;

class BuscaCepController extends Controller {

    public function buscaPorCep($cep)
    {
        return Correios::cep($cep);
    }

}
