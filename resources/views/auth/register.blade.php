@extends('layouts.app')

{{-- Web site Title --}}
@section('title') Cadastrar :: @parent @endsection

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Cadastrar</h2>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            {!! Form::open(array('url' => url('auth/register'), 'method' => 'post', 'files'=> true)) !!}
            <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }} col-md-6">
                {!! Form::label('name', "Nome", array('class' => 'control-label')) !!}<span class="requerido"> *</span>
                <div class="controls">
                    {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                    <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('username') ? 'has-error' : '' }} col-md-6">
                {!! Form::label('username', "Username", array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::text('username', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('username', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }} col-md-12">
                {!! Form::label('email', "Email", array('class' => 'control-label')) !!}<span class="requerido"> *</span>
                <div class="controls">
                    {!! Form::text('email', null, array('class' => 'form-control','required')) !!}
                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }} col-md-6">
                {!! Form::label('password', "Senha", array('class' => 'control-label')) !!}<span class="requerido"> *</span>
                <div class="controls">
                    {!! Form::password('password', array('class' => 'form-control','required')) !!}
                    <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : '' }} col-md-6">
                {!! Form::label('password_confirmation', "Repita a senha", array('class' => 'control-label')) !!}<span class="requerido"> *</span>
                <div class="controls">
                    {!! Form::password('password_confirmation', array('class' => 'form-control','required')) !!}
                    <span class="help-block">{{ $errors->first('password_confirmation', ':message') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
