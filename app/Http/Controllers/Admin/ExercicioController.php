<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use \DB;
use App\Exercicio;
use Datatables;
use \Excel;
use Illuminate\Http\Request;


class ExercicioController extends AdminController
{


    public function __construct()
    {
        view()->share('type', 'exercicio');
    }

    public function index()
    {
        return view('admin.exercicio.index');
    }


    public function create(Request $request)
    {
        $qdt = intval($request->qtdNum);
        //dd($quantidade);
        for ($i = 1; $i <= $qdt; $i++) {

            $produtos = array("xBasketão", "xBaskete", "xBasketinho");
            $rand_keys_produtos = array_rand($produtos);

            $cliente = array("João", "Pedro", "Maria");
            $rand_keys_cliente = array_rand($cliente);

            $func = array("Fabio", "Junior");
            $rand_keys_func = array_rand($func);

            $valor = array("10.00","20.00", "30.00", "40.00");
            $rand_keys_valor = array_rand($valor);

            $quantidade = array("1", "2", "3", "4", "5", "6", "7");
            $rand_keys_quantidade = array_rand($quantidade);

            $dataVenda = array('2016-10-20', '2016-02-21', '2016-04-01');
            $rand_keys_dataVenda = array_rand($dataVenda);

            $tipoPagamneto = array("Dinheiro", "Cartão");
            $rand_keys_tipoPagamneto = array_rand($tipoPagamneto);

            $exercicio = new Exercicio();
            $exercicio->idProdutos = $produtos[$rand_keys_produtos];
            $exercicio->idCliente = $cliente[$rand_keys_cliente];
            $exercicio->idFunc = $func[$rand_keys_func];
            $exercicio->Valor = $valor[$rand_keys_valor];
            $exercicio->Quantidade = $quantidade[$rand_keys_quantidade];
            $exercicio->DataVenda = $dataVenda[$rand_keys_dataVenda];
            $exercicio->TipoPagamneto = $tipoPagamneto[$rand_keys_tipoPagamneto];
            $exercicio->save();
        }

        return redirect('admin/exercicio');
    }

    public function limpar(){
        DB::table('exercicio')->delete();
        return redirect('admin/exercicio');
    }

    public function excel()
    {
        $data = Exercicio::all();

        $excel = Excel::create('Relatorio', function ($excel) use ($data) {

            $excel->sheet('plan1', function ($sheet) use ($data) {

                $sheet->fromModel($data);

            });

        });
        return $excel->export('xls');
    }

    public function data()
    {
        $exercicio = Exercicio::select(array('exercicio.id','exercicio.idProdutos', 'exercicio.idCliente', 'exercicio.idFunc', 'exercicio.Valor', 'exercicio.Quantidade', 'exercicio.DataVenda', 'exercicio.TipoPagamneto'));
        return Datatables::of($exercicio)
            ->remove_column('id')
            ->make();
    }

}