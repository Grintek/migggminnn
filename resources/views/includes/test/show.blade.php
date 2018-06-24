@extends('includes.addy')

@section('content_ter')
    <header>
        <div class="col-lg-4"></div>
        <h1 class="col-lg-8">{{$article->title}}</h1>

    </header>


        <article class="container">

            <h4>{{ $article->body_a }}</h4>
        </article>
@stop