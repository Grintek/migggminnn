@extends('layouts.master')

@section('content')
    <div class="container_cont">
        <div>
            @foreach($channel as $ch)
                <button onclick="window.location='{{route('channel.vk.id',[$ch->vk_id])}}'" style="background: url({{ route('accountedit.image',
                ['filename' => $ch->caption_chan . '-' . $ch->vk_id . '.jpg']) }}) 50% 50%; background-size: cover;" id="channelButton" class="
                @if($ch->offOn_channel === 0)
                        container_channel
                @else
                        container_channel_play
                @endif
                        ">
                </button>
            @endforeach
        </div>
    </div>
@endsection

@section('contentBrand')
    <div class="container_news">

    </div>

<script>
    var token = '{{ Session::token() }}';
</script>
@endsection