@extends('layouts.master')

@section('content')
    <section class="container_cont">
        <div>
            @foreach($channel as $ch)
                <button onclick="window.location='{{route('channel.vk.id',[$ch->vk_id])}}'" style="background: url({{ route('accountedit.image',
                ['filename' => $ch->caption_chan . '-' . $ch->vk_id . '.jpg']) }}) 50% 50%; background-size: cover;" id="channel-{{$ch->vk_id}}" class="
                @if($ch->offOn_channel === 0)
                        container_channel
                @else
                        container_channel_play
                @endif
                        ">
                </button>
            @endforeach
        </div>
    </section>
@endsection

@section('contentBrand')
    <section class="container_news">

    </section>

<script>
    var token = '{{ Session::token() }}';
</script>
@endsection