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
<!-- Container -->
<div class="container">
    <div class="page-header">
        &nbsp;
        <div class="pull-right">
            <button class="btn btn-primary btn-xs close_popup">
                <span class="glyphicon glyphicon-backward"></span> Voltar
            </button>
        </div>
    </div>
    <!-- Content -->
    @yield('content')
            <!-- ./ content -->
    @include('sweet::alert')
    <script type="text/javascript">
        $(function () {
            $('textarea').summernote({height: 250});
            $('form').submit(function (event) {
                event.preventDefault();
                var form = $(this);

                if (form.attr('id') == '' || form.attr('id') != 'fupload') {
                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        data: form.serialize()
                    }).success(function () {
                        setTimeout(function () {
                            parent.$.colorbox.close();
                        }, 10);
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        // Optionally alert the user of an error here...
                        var textResponse = jqXHR.responseText;
                        var alertText = "Confira as mensagens abaixo:\n\n";
                        var jsonResponse = jQuery.parseJSON(textResponse);

                        $.each(jsonResponse, function (n, elem) {
                            alertText = alertText + elem + "\n";
                        });
                        swal({title: "", text: alertText, type: 'error'});
                    });
                }
                else {
                    var formData = new FormData(this);
                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        data: formData,
                        mimeType: "multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData: false
                    }).success(function () {
                        setTimeout(function () {
                            parent.$.colorbox.close();
                        }, 10);

                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        // Optionally alert the user of an error here...
                        var textResponse = jqXHR.responseText;
                        var alertText = "Confira as mensagens abaixo:\n\n";
                        var jsonResponse = jQuery.parseJSON(textResponse);

                        $.each(jsonResponse, function (n, elem) {
                            alertText = alertText + elem + "\n";
                        });

                        swal({title: "", text: alertText, type: 'error'});
                    });
                }
                ;
            });

            $('.close_popup').click(function () {
                parent.$.colorbox.close();
            });
        });
    </script>
    @yield('scripts')
</div>
</body>
</html>