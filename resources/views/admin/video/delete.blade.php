@extends('admin.layouts.modal')
@section('content')
    {!! Form::model($video, array('url' => URL::to('admin/video') . '/' . $video->id, 'method' => 'delete', 'class' => 'bf', 'files'=> true)) !!}
    <div class="form-group" align="center">
        <div class="controls">
            Deseja excluir o vídeo?<br>
            <element class="btn btn-warning btn-sm close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span> Cancelar</element>
            <button type="submit" class="btn btn-sm btn-danger">
                <span class="glyphicon glyphicon-trash"></span> Excluir
            </button>
        </div>
    </div>
    {!! Form::close() !!}
@stop
