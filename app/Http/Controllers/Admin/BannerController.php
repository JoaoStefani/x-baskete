<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\Admin\BannerRequest;
use App\Http\Controllers\AdminController;
use App\Banner;
use App\User;
use Datatables;
use \Image;
use \Auth;
use \Input;
class BannerController extends AdminController{

    public function __construct()
    {
        view()->share('type', 'banner');

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

    public function index()
    {
        return view('admin.banner.index');
    }


    /**
     * Show the form for creating a new resource.
     * Usamos o model user para pegar o usuario autenticado 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::lists('name', 'id')->toArray();

        return view('admin.banner.create_edit', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        try {
            $banner = new Banner($request->all('foto_banner'));
            $banner->user_id = Auth::id();

            $foto_banner = "";
            if(Input::hasFile('foto_banner'))
            {
                $file = Input::file('foto_banner');
                $filename = $file->getClientOriginalName();
                $extension = $file -> getClientOriginalExtension();
                $foto_banner = sha1($filename . time()) . '.' . $extension;
            }

            $banner->foto_banner = $foto_banner;
            $banner->save();

            if(Input::hasFile('foto_banner'))
            {
                $destinationPath = public_path() . '/appfiles/banner/'.$banner->id.'/';
                Input::file('foto_banner')->move($destinationPath, $foto_banner);

                $banner_img = Image::make($destinationPath.$foto_banner);

                // REDIMENSIONANDO DE ACORDO COM O TAMANHO ESCOLHIDO
                if($request->localizacao == 'vertical rectagle') {
                    $banner_img->fit(228, 455, function ($constraint) {
                        $constraint->upsize();
                    });
                }
                if($request->localizacao == 'leaderboard') {
                    $banner_img->fit(800, 90, function ($constraint) {
                        $constraint->upsize();
                    });
                }
                if($request->localizacao == 'verMaisGaragens_e_ultimosAcontecimentos') {
                    $banner_img->fit(800, 90, function ($constraint) {
                        $constraint->upsize();
                    });
                }
                if($request->localizacao == 'medium rectangle') {
                    $banner_img->fit(300, 250, function ($constraint) {
                        $constraint->upsize();
                    });
                }
                if($request->localizacao == 'carousel') {
                    $banner_img->fit(1280, 800, function ($constraint) {
                        $constraint->upsize();
                    });
                }
                $banner_img->save($destinationPath.'red_'.$foto_banner);
            }

        }catch(\Exception $e){
            $error = $e->getMessage();
            return view('errors.503', compact('error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $banner
     * @return \Illuminate\Http\Response
     */
    public function delete($banner)
    {
        $acao = '';
        $salvo = false;

        if($banner){
            unlink('appfiles/banner/'.$banner->id.'/'.$banner->foto_banner);
            unlink('appfiles/banner/'.$banner->id.'/'.'red_'.$banner->foto_banner);
            $salvo = $banner->delete();
            $acao = "Banner deletado com sucesso.";
        }else{
            $acao = "Ocorreu um erro ao deletar o banner.";
        }
        return response()->json(['sucesso'=>$salvo, 'resposta'=>$acao]);
    }

    public function data(){
        $banner = Banner::join('users', 'users.id', '=', 'banners.user_id')
        ->select(array('users.name','banners.localizacao', 'banners.foto_banner', 'banners.created_at', 'banners.id', ));

        return Datatables::of($banner)
        ->add_column('actions',
                    '<a href="{{{ url(\'admin/user/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                        <button onclick="deletar({{$id}})" id="deletar{{$id}}" value="{{$id}}" class="btn btn-sm btn-danger" title="Excluir"><span class="glyphicon glyphicon-trash"></span></button>')
        ->edit_column('created_at', function ($banner) {
                return $banner->created_at ? with(new\Carbon\Carbon($banner->created_at))->format('d/m/Y H:i') : '';})
        ->edit_column('agendamento', function ($banner) {
                return $banner->agendamento ? with(new\Carbon\Carbon($banner->agendamento))->format('d/m/Y') : '';})
        ->edit_column('foto_banner','<img src="/appfiles/banner/{{ $id.\'/\'. $foto_banner }}" width="100" />')
        ->remove_column('id')

        ->make();
    }
}
