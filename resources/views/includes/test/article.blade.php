@extends('includes.addy')

@section('content_ter')


    @foreach($articles as $key)
<article class="container">
    <h2>{{ $key->title }}</h2>
    <h4>{{ $key->body_a }}</h4>
</article>

@endforeach
    <h1>About you</h1>
    <p>
        corresponds to your MySQL server version for the right syntax to use near 'published_at) null, `updated_at` timest
        amp(published_at) null) default character' at line 1 (SQL: create table `"articles"` (`id` int unsigned not null au
        to_increment primary key, `title` varchar(255) not null, `bodyy` text not null, `created_at` timestamp null, `updat
        ed_at` timestamp null, `created_at
    </p>

@stop