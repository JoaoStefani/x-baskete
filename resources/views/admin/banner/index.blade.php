@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') Banners :: Administração @stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
           Banners
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{!! URL::to('admin/banner/create') !!}"
                       class="btn btn-sm  btn-primary iframe"><span
                                class="glyphicon glyphicon-plus-sign"></span> Novo</a>
                </div>
            </div>
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Autor</th>
            <th>Localização</th>
            <th>Banner</th>
            <th>Criado em</th>
            <th width='10%'>Ações</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
@stop
