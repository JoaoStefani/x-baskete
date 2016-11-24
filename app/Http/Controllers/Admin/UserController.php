<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\User;
use App\Http\Requests\Admin\UserRequest;
use Datatables;


class UserController extends AdminController
{
    public function __construct()
    {
        view()->share('type', 'user');
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create_edit');
    }

    public function store(UserRequest $request)
    {

        $user = new User ($request->except('password','password_confirmation'));
        $user->password = bcrypt($request->password);
        $user->confirmation_code = str_random(32);
        $user->save();
    }

    public function edit(User $user)
    {
        return view('admin.user.create_edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $password = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        if (!empty($password)) {
            if ($password === $passwordConfirmation) {
                $user->password = bcrypt($password);
            }
        }
        $user->update($request->except('password','password_confirmation'));
    }

    /**
     * Está funcão deleta o usuário.
     * @param $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($user)
    {
        $acao = '';
        $salvo = false;

        if($user){
            $salvo = $user->delete();
            $acao = "Usuário deletado com sucesso.";
        }else{
            $acao = "Ocorreu um erro ao deletar o usuário.";
        }
        return response()->json(['sucesso'=>$salvo, 'resposta'=>$acao]);
    }

    /**
     * @param $ativacao
     * @param $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function userAtivacao($ativacao, $user){
        $user = User::where('id', '=', $user->id)
                        ->first();
        $acao = '';
        $salvo = false;

        if($user){
            if($ativacao == "ativar"){
                $user->confirmed = 1;
                $salvo = $user->save();
                $acao = "O usuário foi ativando com sucesso.";
            }else{
                $user->confirmed = 0;
                $salvo = $user->save();
                $acao = "O usuário foi desativado com sucesso.";
            }
        }else{
            $acao = "Ocorreu um erro ao ativar/desativar.";
        }
        return response()->json(['sucesso'=>$salvo, 'resposta'=>$acao]);
    }


    public function data()
    {
        $users = User::select(array('users.id',
                                    'users.name',
                                    'users.email',
                                    'users.confirmed',
                                    'users.created_at'
                                    )
                              );

        return Datatables::of($users)
            ->edit_column('confirmed',
                            '@if ($confirmed=="1")
                                    <span class="glyphicon glyphicon-ok" id="iconAtivo{{$id}}"></span>
                                    <span class=\'glyphicon glyphicon-remove\' id="iconDesativo{{$id}}" style="display:none"></span>
                            @else
                                    <span class=\'glyphicon glyphicon-remove\' id="iconDesativo{{$id}}"></span>
                                    <span class="glyphicon glyphicon-ok" id="iconAtivo{{$id}}" style="display:none"></span>
                            @endif')
            ->add_column('actions',
                    '@if ($id!= Auth::id())
                        <a href="{{{ url(\'admin/user/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                        <button onclick="deletar({{$id}})" id="deletar{{$id}}" value="{{$id}}" class="btn btn-sm btn-danger" title="Excluir"><span class="glyphicon glyphicon-trash"></span></button>
                        @if($confirmed=="1")
                            <button onclick="desativar({{$id}})" id="desativar{{$id}}" value="{{$id}}" class="btn btn-sm btn-primary" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
                            <button onclick="ativar({{$id}})" id="ativar{{$id}}" style="display:none" value="{{$id}}" class="btn btn-sm btn-info" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
                        @else
                            <button onclick="ativar({{$id}})" id="ativar{{$id}}" value="{{$id}}" class="btn btn-sm btn-info" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
                            <button onclick="desativar({{$id}})" id="desativar{{$id}}" style="display:none" value="{{$id}}" class="btn btn-sm btn-primary" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
                        @endif
                    @endif')
            ->edit_column('created_at', function ($users) {
                return $users->created_at ? with(new\Carbon\Carbon($users->created_at))->format('d/m/Y H:i') : '';})
            ->remove_column('id')
            ->make();
    }

}
