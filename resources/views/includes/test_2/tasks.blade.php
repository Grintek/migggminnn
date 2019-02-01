@extends('includes.addy')

@section('content_ter')
<h1>Horor</h1>
    <hr/>
<div class="form-control">
    @include('includes.test_2.common.errors')
    <div class="form-group">
    {!! Form::open(['url' => 'test/task']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Создать', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
    </div>
</div>


    @if(count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel panel-default">
            <h4>Текущая задача</h4>
        </div>
        <div class="panel panel-body">
            <table class="table table-striped task-table">

                <thead>
                <th><h4>Task</h4></th>
                <th><h4>&nbsp;</h4></th>
                </thead>

                <tbody>
                @foreach($tasks as $key)
                    <tr>
                        <td class="table-text">
                            <div>{{$key->name}}</div>
                        </td>

                        <td>
                           <form action="{{ url('test/task/'.$key->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>Удалить
                            </button>
                           </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@stop