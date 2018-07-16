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
                    <input type="url" class="form-control" name="url_mov" id="new_mov"></input>
                </div>
                <button type="submit" class="btn btn-primary">создать</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>

@endsection