@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')
        <!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab"> Notícia</a></li>
</ul>
<!-- ./ tabs -->
@if (isset($noticia))
{!! Form::model($noticia, array('url' => url('admin/noticia') . '/' . $noticia->id, 'method' => 'put','id'=>'fupload', 'class' => 'bf', 'files'=> true)) !!}
@else
{!! Form::open(array('url' => url('admin/noticia'), 'method' => 'post', 'class' => 'bf','id'=>'fupload', 'files'=> true)) !!}
@endif
        <!-- Tabs Content -->
<div class="tab-content">
    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">
        <div class="form-group  {{ $errors->has('titulo') ? 'has-error' : '' }}">
            {!! Form::label('titulo', 'Título', array('class' => 'control-label')) !!}<span class="requerido"> *</span>
            <div class="controls">
                {!! Form::text('titulo', null, array('class' => 'form-control','required')) !!}
                <span class="help-block">{{ $errors->first('titulo', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('introducao') ? 'has-error' : '' }}">
            {!! Form::label('introducao', 'Indrodução', array('class' => 'control-label')) !!}<span class="requerido"> *</span>
            <div class="controls">
                {!! Form::textarea('introducao', null, array('class' => 'form-control','required')) !!}
                <span class="help-block">{{ $errors->first('introducao', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('conteudo') ? 'has-error' : '' }}">
            {!! Form::label('conteudo', 'Conteúdo', array('class' => 'control-label')) !!}<span class="requerido"> *</span>
            <div class="controls">
                {!! Form::textarea('conteudo', null, array('class' => 'form-control','required')) !!}
                <span class="help-block">{{ $errors->first('conteudo', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('fonte') ? 'has-error' : '' }}">
            {!! Form::label('fonte', 'Fonte', array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::text('fonte', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('fonte', ':message') }}</span>
            </div>
        </div>
        <div
                class="form-group {!! $errors->has('imagem') ? 'error' : '' !!} ">
            <div class="col-lg-12">
                {!! Form::label('imagem', 'Imagem', array('class' => 'control-label')) !!}
                <input name="imagem"
                       type="file" class="uploader" id="image" value="Upload"/>
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
            <span class="glyphicon glyphicon-ban-circle"></span>
            Cancelar
        </button>
        <button type="submit" class="btn btn-sm btn-success">
            <span class="glyphicon glyphicon-ok-circle"></span>
            @if	(isset($noticias))
                Editar
            @else
                Salvar
            @endif
        </button>
    </div>
</div>
<!-- ./ form actions -->

</form>
@endsection
