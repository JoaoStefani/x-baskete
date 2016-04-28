@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') Exercício Lanchonete :: Administração
@stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            Exercício da Lanchonete
        </h3>
    </div>

        {!! Form::open(array('url' => URL::to('admin/exercicio/create'), 'name'=>'gerar' ,'method' => 'get', 'class' => 'bf', 'id'=>'gerar', 'files'=> true)) !!}
        <!-- <div class="col-md-2">
            Gerar números de
            {!! Form::number('gerar_de', null, array('class' => 'form-control', 'id'=>'gerar_de', 'required' => 'required')) !!}
        </div>
        <div class="col-md-2">
            até
            {!! Form::number('gerar_ate', null, array('class' => 'form-control', 'id'=>'gerar_ate', 'required' => 'required')) !!}
        </div> -->
        <div class="col-md-2">
            Quantidade de registros
            {!! Form::number('qtdNum', null, array('class' => 'form-control', 'id'=>'qtdNum', 'required' => 'required')) !!}
        </div>
        <div class="col-md-2" style="top: 20px;">
            <button type="submit" class="btn btn-sm btn btn-warning"><i class="glyphicon glyphicon-refresh"></i> Gerar</button>
        </div>
        {!! Form::close() !!}
        <div class="col-md-4" style="top: 20px;">
            <a href="exercicio/limpar" id="btn_limpar" class="pull-right btn btn-sm btn btn-danger"><i class="fa fa-trash"></i> Limpar Registros</a>
            <a href="exercicio/excel?export=1" id="btn_exporta" target="_blank" class="pull-right btn btn-sm btn btn-success"><i class="glyphicon glyphicon-share"></i> Exportar para Excel</a>
        </div>
    <hr width=100%>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Produtos</th>
            <th>Cliente</th>
            <th>Funcionario</th>
            <th>Valor</th>
            <th>Quantidade</th>
            <th>Data Venda</th>
            <th>Tipo Pagamento</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
@stop