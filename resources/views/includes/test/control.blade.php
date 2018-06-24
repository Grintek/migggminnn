@extends('includes.addy')

@section('content_ter')

    <h1>Новый пост</h1>
    <hr/>
    {!! Form::open(['url' => 'article']) !!}

    <div class="form-group">
        {!!Form::label('title', 'Title:')!!}
        {!!Form::text('title', null, ['class' => 'form-control'])!!}
    </div>

    <div class="form-group">

        {!!Form::label('body_a', 'Body_a:')!!}
        {!!Form::textarea('body_a', null, ['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>


    {!! Form::close() !!}


@stop
