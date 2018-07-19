@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')

    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Новый стрим</h3></header>
            <form action="{{ route('admin') }}" method="post">
                <div class="form-group">
                    <input type="url" class="form-control" name="url_mov" id="new_mov">
                </div>
                <button type="submit" class="btn btn-primary">создать</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>


    <div class="navbar line"></div>

    <section class="row new-post">
        <div class="col-lg-6 col-md-offset-3">
            <header><h4>Tut sozdaetsy vash kanal i td i tp</h4></header>
            <hr>
            <div class="navbar line2"></div>

            <form action="{{ route('admin') }}" method="post">
                <header><h3>заголовок канала</h3></header>
                <input type="text" class="form-control" name="caption_chan" id="new_channel">
                <hr>
                <hr>
                <header><h3>Описание</h3></header>
                <textarea class="form-control" style="padding-bottom: 200px;" name="descript_chan"></textarea>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>

    </section>

@endsection