@extends('layouts.master')

@section('contentBrand')
    @include('includes.message-block')
    <section class="row">
        <div class="col-10 "></div>
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
    var urlEdit = '{{ route('edit') }}';
    var urlLike = '{{ route('like') }}';
</script>
@endsection