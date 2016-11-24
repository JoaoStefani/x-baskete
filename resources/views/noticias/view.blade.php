@extends('layouts.app')
{{-- Web site Title --}}
@section('title') {!!  $noticia->title !!} :: @parent @endsection

@section('meta_author')
    <meta name="author" content="{!! $noticia->author->username !!}"/>
@endsection
{{-- Content --}}
@section('content')
    <h3>{{ $noticia->title }}</h3>
    <p>{!! $noticia->introduction !!}</p>
    @if($noticia->picture!="")
        <img alt="{{$noticia->picture}}"
             src="{!! url('appfiles/noticia/'.$noticia->id.'/'.$noticia->picture) !!}"/>
    @endif
    <p>{!! $noticia->content !!}</p>
    <div>
        <span class="badge badge-info">Posted {!!  $noticia->created_at !!} </span>
    </div>
@endsection
