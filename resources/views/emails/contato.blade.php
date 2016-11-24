@extends('layouts.contato_app')
@section('content')
    <h2>LARAVEL V5.1</h2>

    <div>
        Nome:<strong>{{ $nome }}</strong><br>
        Email:<strong>{{ $email }}</strong><br>
        Telefone:<strong>{{ $telefone }}</strong><br>
        Assunto:<strong>{{ $assunto }}</strong><br>
        Mensagem:<strong>{{ $mensagem }}</strong>
    </div>
@endsection