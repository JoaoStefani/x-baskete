<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TipoCardapioRequest;
use App\TipoCardapio;
use App\User;
use Datatables;
use \Auth;
use App\Http\Requests;

class TipoCardapioController extends AdminController
{

     public function __construct()
    {
        view()->share('type', 'tipo_cardapio');

        parent::__construct();
        $this->middleware('auth');

        $this->middleware('admin', ['only' => [
            'create',
            'store',
            'edit',
            'update',
            'delete',
            'index',
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tipo_cardapio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::lists('name', 'id')->toArray();

        return view('admin.tipo_cardapio.create_edit', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoCardapioRequest $request)
    {
        $tipo_cardapio = new TipoCardapio($request->all());
        $tipo_cardapio->user_id = Auth::id();
        $tipo_cardapio->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoCardapio $tipo_cardapio)
    {
        return view('admin.tipo_cardapio.create_edit', compact('tipo_cardapio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $tipo_cardapio
     * @return \Illuminate\Http\Response
     */
    public function update(TipoCardapioRequest $request, TipoCardapio $tipo_cardapio)
    {
        $tipo_cardapio->user_id = Auth::id();
        $tipo_cardapio->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $tipocardapio
     * @return \Illuminate\Http\Response
     */
    public function delete($tipocardapio)
    {
        $acao = '';
        $salvo = false;

        if($tipocardapio){
            $salvo = $tipocardapio->delete();
            $acao = " Tipo Cardápio deletado com sucesso.";
        }else{
            $acao = "Ocorreu um erro ao deletar o tipo cardápio.";
        }
        return response()->json(['sucesso'=>$salvo, 'resposta'=>$acao]);
    }

    /**
     * @param $ativacao
     * @param $tipocardapio
     * @return \Illuminate\Http\JsonResponse
     */
    public function tipocardapioAtivacao($ativacao, $tipocardapio){
        $tipocardapio = TipoCardapio::where('id', '=', $tipocardapio->id)
                                                        ->first();

        //dd($tipocardapio);
        $acao = '';
        $salvo = false;

        if($tipocardapio){
            if($ativacao == "ativar"){
                $tipocardapio->ativo = 1;
                $salvo = $tipocardapio->save();
                $acao = "O Tipo Cardápio foi ativando com sucesso.";
            }else{
                $tipocardapio->ativo = 0;
                $salvo = $tipocardapio->save();
                $acao = "O Tipo Cardápio foi desativado com sucesso.";
            }
        }else{
            $acao = "Ocorreu um erro ao ativar/desativar.";
        }
        return response()->json(['sucesso'=>$salvo, 'resposta'=>$acao]);
    }   

    public function data(){
        $tipo_cardapio = TipoCardapio::join('users', 'users.id', '=', 'tipo_cardapios.user_id')
        ->select(array('users.name','tipo_cardapios.nome', 'tipo_cardapios.ativo', 'tipo_cardapios.created_at', 'tipo_cardapios.id', ));

        return Datatables::of($tipo_cardapio)
        ->edit_column('ativo',
                            '@if ($ativo=="1")
                                    <span class="glyphicon glyphicon-ok" id="iconAtivo{{$id}}"></span>
                                    <span class=\'glyphicon glyphicon-remove\' id="iconDesativo{{$id}}" style="display:none"></span>
                            @else
                                    <span class=\'glyphicon glyphicon-remove\' id="iconDesativo{{$id}}"></span>
                                    <span class="glyphicon glyphicon-ok" id="iconAtivo{{$id}}" style="display:none"></span>
                            @endif')
        ->add_column('actions',
                    '<a href="{{{ url(\'admin/tipo_cardapio/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                     <button onclick="deletar({{$id}})" id="deletar{{$id}}" value="{{$id}}" class="btn btn-sm btn-danger" title="Excluir"><span class="glyphicon glyphicon-trash"></span></button>
                     @if($ativo=="1")
                        <button onclick="desativar({{$id}})" id="desativar{{$id}}" value="{{$id}}" class="btn btn-sm btn-primary" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
                        <button onclick="ativar({{$id}})" id="ativar{{$id}}" style="display:none" value="{{$id}}" class="btn btn-sm btn-info" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
                     @else
                        <button onclick="ativar({{$id}})" id="ativar{{$id}}" value="{{$id}}" class="btn btn-sm btn-info" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
                        <button onclick="desativar({{$id}})" id="desativar{{$id}}" style="display:none" value="{{$id}}" class="btn btn-sm btn-primary" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
                     @endif')
        ->edit_column('created_at', function ($tipo_cardapio) {
                return $tipo_cardapio->created_at ? with(new\Carbon\Carbon($tipo_cardapio->created_at))->format('d/m/Y H:i') : '';})
        ->remove_column('id')

        ->make();
    }
}
