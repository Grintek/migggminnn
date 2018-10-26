@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')
    <div class="blocLog2" style="margin-top: 20px; padding: 10px">
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Новый URL стрима</h3></header>
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
            <header><h2>Создание своего канала</h2></header>
            <div class="line2" style="padding-left: 100%"></div>

            <form action="{{ route('admin.createChanel') }}" method="post">
                <header><h3>заголовок канала</h3></header>
                <input type="text" class="form-control" name="caption_chan" id="new_channel">
                <hr>
                <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">Дата</label>
                    <div class="col-10">
                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                    </div>
                </div>
                <hr>
                <header><h3>Описание</h3></header>
                <textarea class="form-control" style="padding-bottom: 200px;" name="description_chan"></textarea>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <hr>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>

    </section>
    </div>
@endsection