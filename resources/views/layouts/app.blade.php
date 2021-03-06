<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('title') X-BASKETE @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
    @show

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">

		<link href="{{ asset('css/w3.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css')}}">

        <script src="{{ asset('js/site.js') }}"></script>
        <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert.min.js')}}"></script>

        <style>
            body, html {height: 100%}
            body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
            .bgimg {
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url(fundo.jpg);
                min-height: 90%;
            }
        </style>

    @yield('styles')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="{!! asset('/favicon.ico')  !!} ">
</head>
<body>
@include('partials.nav')

<div class="container">
@yield('content')
</div>
@include('partials.footer')

<!-- Scripts -->
@yield('scripts')

</body>
</html>
