@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <div class="blocLog">

        <div class="blocLog2" style="padding: 40px; color: rgba(21,67,131,0.96);">
            <div>
                <a class="btn btn-primary" href="{{route('accountedit')}}" style="float: right">Настройка Аккаунта</a>
            </div>
            <div>
                <h1>Твой Аккаунт</h1>
            </div>
            <div style="margin-bottom: 10px">
                <div style="background: url({{ route('accountedit.image',
                ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}) 50% 50%; background-size: cover;" class="img_user"></div>
            </div>
            <div class="blocAccount">
                <h4 class="blockInline">Твой ник: </h4><p class="blockInline" style="float: right; font-size: 20px;">{{$user->first_name}}</p>
            </div>
            <div class="blocAccount">
                <h4 class="blockInline">Твой email: </h4><p class="blockInline" style="float: right; font-size: 20px;">{{$user->email}}</p>
            </div>
        </div>
    </div>
@endsection