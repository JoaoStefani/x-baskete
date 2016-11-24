<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('title') Administração @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
    @show
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/sweetalert.css')}}">
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    @yield('styles')
</head>
<body>
<div id="wrapper">
    @include('admin.partials.nav')
    <div id="page-wrapper">
        @yield('main')
    </div>
</div>
@include('sweet::alert')
<script type="text/javascript">
    @if(isset($type))
    var oTable;
    $(document).ready(function () {
        oTable = $('#table').DataTable({
            "oLanguage": {
                "sProcessing": 'Processando...',
                "sLengthMenu": 'Mostrar _MENU_ elementos',
                "sZeroRecords": 'Não há resultados',
                "sInfo": 'Visualizando _START_ ao _END_ de _TOTAL_ elementos',
                "sEmptyTable": 'Não há dados na tabela',
                "sInfoEmpty": 'Visualizando 0 ao 0 de 0 elementos',
                "sInfoFiltered": '(filtrado de um total de _MAX_ elementos)',
                "sInfoPostFix": "",
                "sSearch": 'Procurar:',
                "sUrl": "",
                "oPaginate": {
                    "sFirst": 'Início',
                    "sPrevious": 'Anterior',
                    "sNext": 'Próximo',
                    "sLast": 'Fim'
                }
            },
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": "{{ url('admin/'.$type.'/data') }}",
            "pagingType": "full_numbers",
            "fnDrawCallback": function (oSettings) {
                $(".iframe").colorbox({
                    iframe: true,
                    width: "80%",
                    height: "80%",
                    onClosed: function () {
                        oTable.ajax.reload();
                    }
                });

                $(".iframedelete").colorbox({
                    iframe: true,
                    width: "40%",
                    height: "40%",
                    onClosed: function () {
                        oTable.ajax.reload();
                    }
                });
            }
        });
    });
    @endif
</script>
@yield('scripts')
</body>
</html>