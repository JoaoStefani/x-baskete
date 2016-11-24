<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use App\Http\Requests\Admin\VideoRequest;
use App\Http\Controllers\AdminController;
use Datatables;
use \Auth;


class VideoController extends AdminController
{

    public function __construct()
    {
        view()->share('type', 'video');
    }

    public function index()
    {
        return view('admin.video.index');
    }


    public function create()
    {
        return view('admin.video.create_edit');
    }

    public function store(VideoRequest $request)
    {
        $video = new Video($request->all());
        $video->user_id = Auth::id();
        $video->save();
    }

    public function edit(Video $video)
    {
        return view('admin.video.create_edit',compact('video'));
    }

    public function update(VideoRequest $request, Video $video)
    {
        $video->user_id_edited = Auth::id();
        $video->update($request->all());
    }

    public function delete(Video $video)
    {
        return view('admin.video.delete', compact('video'));
    }

    public function destroy(Video $video)
    {
        $video->delete();
    }

    public function data()
    {
        $videos = Video::join('users', 'users.id', '=', 'videos.user_id')
            ->select(array('videos.id','users.name as administrador','videos.link','videos.created_at'));

        return Datatables::of($videos)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/video/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{{ URL::to(\'admin/video/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframedelete" title="Excluir"><span class="glyphicon glyphicon-trash"></span></a>
                <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->edit_column('created_at', function ($videos) {
                return $videos->created_at ? with(new\Carbon\Carbon($videos->created_at))->format('d/m/Y H:i') : '';})
            ->remove_column('id')
            ->make();
    }
}
