@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') Notícias :: @parent @endsection

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            Notícias
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{!! url('admin/noticia/create') !!}"
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
            <th>Título</th>
            <th>Imagem</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

{{-- Scripts --}}
@section('scripts')
@endsection
