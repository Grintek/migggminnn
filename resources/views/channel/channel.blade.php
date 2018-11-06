@extends('layouts.channelStr')

@section('content')
    <div style="width: 80%; float: left;">
        <div class="channel_player">
            <iframe width="940"  height="500"  src="https://www.youtube.com/embed/73GjdIcU0YI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        <div class="blocLog2" style="width: 90%; margin-top: 30px; padding: 10px; height: 100%">
            <h5 style="display: inline">канал: {{$channel->caption_chan}}</h5>
            <h5 style="display: inline; float: right">{{$channel->date_channel}}</h5>
        </div>
        <div class="blocLog2" style="width: 90%; margin-top: 30px; padding: 10px; height: 100%">
            <p>{{$channel->description_chan}}</p>
        </div>

    </div>
@endsection

@section('contentBrand')
<div style="width: 20%; float: right; background: #133d55; padding-bottom: 100%;">
</div>
@endsection