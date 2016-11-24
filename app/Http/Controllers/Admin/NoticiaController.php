<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Noticia;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NoticiaRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Image;

class NoticiaController extends AdminController {

    public function __construct()
    {
        view()->share('type', 'noticia');
    }

    public function index()
    {
        return view('admin.noticia.index');
    }

    public function create()
    {
        return view('admin.noticia.create_edit');
    }

    public function store(NoticiaRequest $request)
    {
        $noticia = new Noticia($request->except('imagem'));
        $noticia->user_id = Auth::id();
        $imagem = "";
        if(Input::hasFile('imagem'))
        {
            $file = Input::file('imagem');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imagem = sha1($filename . time()) . '.' . $extension;
        }
        $noticia->imagem = $imagem;
        $noticia->save();

        if(Input::hasFile('imagem'))
        {
            $destinationPath = public_path() . '/appfiles/noticias/'.$noticia->id.'/';
            Input::file('imagem')->move($destinationPath, $imagem);

            # Redimensionando
            $redimensionada = Image::make($destinationPath.$imagem);

            $redimensionada->fit(780, 438, function ($constraint) {
                $constraint->upsize();
            });
            $redimensionada->save($destinationPath.'red_'.$imagem);
        }
    }

    public function edit(Noticia $noticia)
    {
        return view('admin.noticia.create_edit', compact('noticia'));
    }

    public function update(NoticiaRequest $request, Noticia $noticia)
    {
        $noticia->user_id_edited = Auth::id();
        $imagem = "";
        if(Input::hasFile('imagem'))
        {
            $noticia['imagem'] = $noticia->imagem;
            if($noticia['imagem']!=''){
                unlink('appfiles/noticias/'.$noticia->id.'/'.$noticia->imagem);
                unlink('appfiles/noticias/'.$noticia->id.'/red_'.$noticia->imagem);
            }

            $file = Input::file('imagem');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imagem = sha1($filename . time()) . '.' . $extension;
        }
        $noticia->imagem = $imagem;
        $noticia->update($request->except('imagem'));

        if(Input::hasFile('imagem'))
        {
            $destinationPath = public_path() . '/appfiles/noticias/'.$noticia->id.'/';
            Input::file('imagem')->move($destinationPath, $imagem);

            # Redimensionando
            $redimensionada = Image::make($destinationPath.$imagem);

            $redimensionada->fit(780, 438, function ($constraint) {
                $constraint->upsize();
            });
            $redimensionada->save($destinationPath.'red_'.$imagem);
        }
    }

    public function delete(Noticia $noticia)
    {
        return view('admin.noticia.delete', compact('noticia'));
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
    }

    public function data()
    {
        $noticias = Noticia::join('users', 'users.id', '=', 'noticias.user_id')
                           ->select(array('noticias.id',
                                          'users.name as administrador',
                                          'noticias.titulo',
                                          'noticias.imagem',
                                          'noticias.created_at'
                                         )
                                    );

        return Datatables::of($noticias)
            ->add_column('actions', '<a href="{{{ url(\'admin/noticia/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{{ url(\'admin/noticia/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframedelete" title="Excluir"><span class="glyphicon glyphicon-trash"></span></a>
                    <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->edit_column('imagem','@if($imagem)<img src="/appfiles/noticias/{{ $id.\'/red_\'. $imagem }}" width="100" />@endif')
            ->edit_column('created_at', function ($noticias) {
                return $noticias->created_at ? with(new\Carbon\Carbon($noticias->created_at))->format('d/m/Y H:i') : '';})
            ->remove_column('id')
            ->make();
    }
}
