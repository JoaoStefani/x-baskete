@extends('layouts.app')
@section('title') Home :: @parent @endsection
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Home Page</h2>
    </div></div>

    @if(count($noticias)>0)
        <div class="row">
            <h2>Novo</h2>
            @foreach ($noticias as $post)
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>
                                <strong><a href="{{url('noticia/'.$post->slug.'')}}">{{
                                        $post->titulo }}</a></strong>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{url('news/'.$post->slug.'')}}" class="thumbnail"><img
                                        src="http://placehold.it/260x180" alt=""></a>
                        </div>
                        <div class="col-md-10">
                            <p>{!! $post->introducao !!}</p>

                            <p>
                                <a class="btn btn-mini btn-default"
                                   href="{{url('news/'.$post->slug.'')}}">Read more</a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p></p>

                            <p>
                                <span class="glyphicon glyphicon-user"></span> by <span
                                        class="muted">{{ $post->autor->name }}</span> | <span
                                        class="glyphicon glyphicon-calendar"></span> {{ $post->created_at }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @include('sweet::alert')
@endsection


