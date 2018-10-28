@extends('layouts.master')

@section('content')
    <section>
        wasrfwsaerf
    </section>
@endsection

@section('contentBrand')
    <section>
        <div class="col-2 blocChat_fon">
            @foreach($posts as $post)
                <article class="blocChat" data-postid="{{ $post->id }}">
                    <div class="info">
                        {{$post->user->first_name}}
                    </div>
                    <p style="color: #1810ff">{{ $post->body }}</p>
                    <p>{{ $post->created_at }}</p>
                </article>
            @endforeach
        </div>
    </section>

<script>
    var token = '{{ Session::token() }}';
</script>
@endsection