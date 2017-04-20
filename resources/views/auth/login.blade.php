<!DOCTYPE html>
<html>
<title>X-Baskete</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link href="{{ asset('css/w3.css') }}" rel="stylesheet">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url("http://xbaskete.dev/fundo.jpg");
    min-height: 100%;
}
</style>
<body>
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-middle w3-center">
        <span class="w3-text-white w3-hide-small" style="font-size:100px">Entre com sua conta</span>
        {!! Form::open(array('url' => url('auth/login'), 'method' => 'post', 'files'=> true)) !!}
        <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }} col-md-6 col-md-offset-2">
            {!! Form::label('email', "E-Mail", array('class' => 'w3-text-white w3-xxlarge')) !!}
            <div class="controls">
                {!! Form::text('email', null, array('class' => 'w3-input w3-padding-16 w3-border')) !!}
                <span class="help-block">{{ $errors->first('email', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }} col-md-6 col-md-offset-2">
            {!! Form::label('password', "Password", array('class' => 'w3-text-white w3-xxlarge')) !!}
            <div class="controls">
                {!! Form::password('password', array('class' => 'w3-input w3-padding-16 w3-border')) !!}
                <span class="help-block">{{ $errors->first('password', ':message') }}</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label class="w3-text-white">
                        <input type="checkbox" name="remember"> Lembrar-me
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="w3-button w3-xxlarge w3-black" style="margin-right: 15px;">
                    Login
                </button>

                <a  class="w3-text-white" href="{{ url('/password/email') }}">Esqueceu sua senha?</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</header>
</body>
</html>


