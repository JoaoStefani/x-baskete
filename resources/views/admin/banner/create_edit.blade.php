@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')
        <!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab">Banners</a></li>
</ul>
<!-- ./ tabs -->
@if (isset($banner))
{!! Form::model($banner, array('url' => URL::to('admin/banner') . '/' . $banner->id, 'method' => 'put','id'=>'fupload', 'class' => 'bf', 'files'=> true)) !!}
@else
{!! Form::open(array('url' => URL::to('admin/banner'), 'method' => 'post', 'class' => 'bf','id'=>'fupload', 'files'=> true)) !!}
@endif
<!-- Tabs Content -->
<div class="tab-content">
    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">
         <div class="col-md-6 {{ $errors->has('localizacao') ? 'has-error' : '' }}">
            {!! Form::label('localizacao', trans("Local do Banner"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::select('localizacao', [''=>'Selecione uma localizacão', 
                                                'carousel'=>'Carousel (1280x800)',
                                                'leaderboard'=>'Entre ver mais anúncios e garagens (800x90)',
                                                'verMaisGaragens_e_ultimosAcontecimentos'=>'Entre ver mais garagens e últimos acontecimentos (800x90)', 
                                                'medium rectangle'=>'Abaixo de eventos (300x250)'], null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('localizacao', ':message') }}</span>
            </div>
        </div>
        <div class="col-md-6  {{ $errors->has('link') ? 'has-error' : '' }}">
            {!! Form::label('link', trans("Link do Banner"), array('class' => 'control-label', 'placeholder'=>'Ex: https://meusite.com.br/')) !!}
            <div class="controls">
                {!! Form::text('link', null, array('class' => 'form-control', 'required' => 'required')) !!}
                <span class="help-block">{{ $errors->first('link', ':message') }}</span>
            </div>
        </div>
        <div class="col-md-6  {{ $errors->has('datainicio') ? 'has-error' : '' }}">
            {!! Form::label('datainicio', trans("Data Início"), array('class' => 'control-label', 'required' => 'required')) !!}
            <div class="controls">
                {!! Form::date('datainicio', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('datainicio', ':message') }}</span>
            </div>
        </div>
        <div class="col-md-6  {{ $errors->has('datafinal') ? 'has-error' : '' }}">
            {!! Form::label('datafinal', trans("Data Final"), array('class' => 'control-label', 'required' => 'required')) !!}
            <div class="controls">
                {!! Form::date('datafinal', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('datafinal', ':message') }}</span>
            </div>
        </div>


        <div class="col-md-6 {!! $errors->has('foto_banner') ? 'error' : '' !!} ">
            @if (isset($banner))
                <img src="/appfiles/banner/{{$banner->id.'/'.$banner->foto_banner}}" style="max-width:100px" />
            @endif
            <div class="controls">
                {!! Form::label('foto_banner', trans("Foto do Banner"), array('class' => 'control-label')) !!}
                <input name="foto_banner" type="file" class="form-control uploader" id="foto_banner" value="Upload"/></br>
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
                Salvar
        </button>
    </div>
</div>
<!-- ./ form actions -->

</form>
@stop
