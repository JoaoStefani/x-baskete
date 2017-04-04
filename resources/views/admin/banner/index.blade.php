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
            <th>Ativo</th>
            <th>Criado em</th>
            <th width='10%'>Ações</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop

@section('scripts')
    <script type="text/javascript">

        /**
         * Está função é pra desativar o banner em tempo real.
         * @param id
         */
        function desativar(id){
            jQuery.ajax({
                url: "/admin/banner/desativar/"+$('#desativar'+id).val()
            }).done(function(retorno) {
                if(retorno.sucesso){
                    swal(retorno.resposta.toString());
                    $('#desativar'+id).hide();
                    $('#ativar'+id).show();
                    $('#iconDesativo'+id).show();
                    $('#iconAtivo'+id).hide();
                }else{
                    swal(retorno.resposta.toString());
                }
            });
        }

        /**
         * Está função é pra ativar o banner em tempo real.
         * @param id
         */
        function ativar(id){
            jQuery.ajax({
                url: "/admin/banner/ativar/"+$('#ativar'+id).val()
            }).done(function(retorno) {
                if(retorno.sucesso){
                    swal(retorno.resposta.toString());
                    $('#desativar'+id).show();
                    $('#ativar'+id).hide();
                    $('#iconDesativo'+id).hide();
                    $('#iconAtivo'+id).show();
                }else{
                    swal(retorno.resposta.toString());
                }
            });
        }

        /**
         * Está função é pra deletar o banner.
         * @param id
         */
        function deletar(id){
            swal({
                    title: "Deseja excluir o banner?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, Deletar!",
                    closeOnConfirm: false
                  },
            function(){
                jQuery.ajax({
                    url: "/admin/banner/"+$('#deletar'+id).val()+"/delete"
                }).done(function(retorno) {
                    if(retorno.sucesso){
                        swal(retorno.resposta.toString());
                        document.location = '{{ URL::to("admin/banner") }}';
                    }else{
                        swal(retorno.resposta.toString());
                    }
                });
            });
        }
    </script>
@endsection

