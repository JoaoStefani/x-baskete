@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') Vídeos :: @parent @stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            Vídeos
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{!! URL::to('admin/video/create') !!}"
                       class="btn btn-sm  btn-primary iframe"><span
                                class="glyphicon glyphicon-plus-sign"></span> Novo</a>
                </div>
            </div>
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Cadastrado por</th>
            <th>Link</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
@stop
