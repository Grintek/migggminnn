@extends('layouts.master')

@section('content')
    <section class="container_cont">
        <div>
            @foreach($channel as $ch)
                <button onclick="window.location='{{route('channel.vk.id',[$ch->vk_id])}}'" style="background: url({{ route('accountedit.image',
                ['filename' => $ch->caption_chan . '-' . $ch->vk_id . '.jpg']) }}) 50% 50%; background-size: cover;" id="channel-{{$ch->vk_id}}" class=
                @if($ch->offOn_channel === 0)
                        "container_channel">
                @else
                        "container_channel_play">
                @endif
                </button>
            @endforeach
        </div>
    </section>
@endsection

@section('contentBrand')
    <section class="container_news">
        <div class="blocChat_fon">
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