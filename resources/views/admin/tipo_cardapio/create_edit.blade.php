@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')
        <!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab">Tipo Cardápios</a></li>
</ul>
<!-- ./ tabs -->
@if (isset($tipo_cardapio))
{!! Form::model($tipo_cardapio, array('url' => url('admin/tipo_cardapio') . '/' . $tipo_cardapio->id .'/update', 'method' => 'put', 'class' => 'bf', 'files'=> true)) !!}
@else
{!! Form::open(array('url' => URL::to('admin/tipo_cardapio'), 'method' => 'post', 'class' => 'bf','id'=>'fupload', 'files'=> true)) !!}
@endif
<!-- Tabs Content -->
<div class="tab-content">
    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">
        <div class="col-md-6  {{ $errors->has('nome') ? 'has-error' : '' }}">
            {!! Form::label('nome', trans("Nome"), array('class' => 'control-label', 'placeholder'=>'Ex: https://meusite.com.br/')) !!}
            <div class="controls">
                {!! Form::text('nome', null, array('class' => 'form-control', 'required' => 'required')) !!}
                <span class="help-block">{{ $errors->first('nome', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('ativo') ? 'has-error' : '' }}">
            {!! Form::label('ativo', 'Ativo', array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::label('ativo', 'Sim', array('class' => 'control-label')) !!}
                {!! Form::radio('ativo', '1', @isset($tipo_cardapio)? $tipo_cardapio->ativo : 'false') !!}
                {!! Form::label('ativo', 'Não', array('class' => 'control-label')) !!}
                {!! Form::radio('ativo', '0', @isset($tipo_cardapio)? $tipo_cardapio->ativo : 'true') !!}
                <span class="help-block">{{ $errors->first('ativo', ':message') }}</span>
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
            @if(isset($tipo_cardapio))
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
