@extends('layouts.master')

@section('title')
    BaneName
@endsection

@section('content')
<div class="blocLog" style="width: 500px">
    <div class="blocLog2" style="padding: 40px">
        <h5 style="color: #1f72a1">Придумайте себе имя</h5>
        <form action="{{route('baner.save')}}" method="post" enctype="multipart/form-data">
            <input type="text" name="first_name" class="form-control" id="first_name">
            <button type="submit" class="btn btn-primary" style="margin-top: 10px">Жмак</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
    </div>
</div>
@endsection