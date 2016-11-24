@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')
        <!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab"> Vídeo</a></li>
</ul>
<!-- ./ tabs -->
@if (isset($video))
{!! Form::model($video, array('url' => URL::to('admin/video') . '/' . $video->id, 'method' => 'put','id'=>'fupload', 'class' => 'bf', 'files'=> true)) !!}
@else
{!! Form::open(array('url' => URL::to('admin/video'), 'method' => 'post', 'class' => 'bf','id'=>'fupload', 'files'=> true)) !!}
@endif
        <!-- Tabs Content -->
<div class="tab-content">
    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">

        <div class="form-group  {{ $errors->has('link') ? 'has-error' : '' }}">
            {!! Form::label('link', "Link do vídeo", array('class' => 'control-label')) !!}<font color="red"> *</font>
            <div class="controls">
                {!! Form::text('link', null, array('class' => 'form-control', 'required'=>'required','maxlength'=>'255')) !!}
                <span class="help-block">{{ $errors->first('link', ':message') }}</span>
            </div>
        </div>
        <!-- ./ general tab -->
    </div>
    <!-- ./ tabs content -->
</div>

<!-- Form Actions -->

<div class="form-group">
    <div class="col-md-12">
        <button type="reset" class="btn btn-sm btn-warning close_popup">
            <span class="glyphicon glyphicon-ban-circle"></span> Cancelar
        </button>
        <button type="submit" class="btn btn-sm btn-success">
            <span class="glyphicon glyphicon-ok-circle"></span>
            @if	(isset($video))
                Editar
            @else
                Salvar
            @endif
        </button>
    </div>
</div>
<!-- ./ form actions -->

</form>
@stop
