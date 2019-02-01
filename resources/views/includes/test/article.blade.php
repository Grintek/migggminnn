@extends('includes.addy')

@section('content_ter')

    <header><h1>Blog</h1></header>
    <hr/>
    @foreach($articles as $key)
<article class="container">
    <a href="{{ action('ArticleController@show', [ $key->id ]) }}"><h2>{{ $key->title }}</h2></a>
    <h4>{{ $key->body_a }}</h4>
</article>

@endforeach



@stop