@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')

    <div class="container">

        <form action="{{route('admin')}}" method="post">

            <input type="url" name="urlMovi">
            <input type="submit">
        </form>


    </div>

@endsection