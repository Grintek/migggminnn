@extends('layouts.channelStr')

@section('content')
    <div style="width: 60%; float: left;">
        <div class="channel_player">
            <iframe width="940"  height="500"  src="https://www.youtube.com/embed/73GjdIcU0YI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        <div class="blocLog2">
            <h2>Канал {{$user}}</h2>
        </div>
    </div>
@endsection

@section('contentBrand')
<div style="width: 40%; float: right; background: #133d55; padding-bottom: 100%;">
</div>
@endsection