@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')
    <div class="blocLog2" style="margin-top: 20px; padding: 10px; width: 70%;">
    <div class="row new-post">
        <div class="blockForm">
            <h3>Новый URL стрима</h3>
            <form action="{{ route('admin.createUrl') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" name="url_mov" id="new_mov">
                </div>
                <button type="submit" class="btn btn-primary">создать</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </div>
    <div class="navbar line"></div>

    <div class="row new-post">
        <div class="blockForm">
            <h2 style="text-align: center;">Создать или обновить канал</h2>
            <div class="line2" style="padding-left: 100%"></div>

            <form action="{{ route('admin.createChanel') }}" method="post" enctype="multipart/form-data">
                <h3>заголовок канала</h3>
                <input type="text" class="form-control" name="caption_chan" id="first_name" value="@if(isset($chan)){{$chan->caption_chan}}@endif">
                <hr>
                <div>
                    <label for="image_channel">Изображение канала (only .jpg)</label>
                    <input type="file" name="image_channel" class="form-control" id="first_name">
                </div>
                <hr>
                <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">Дата</label>
                    <div class="col-10">
                        <input class="form-control" type="date" value="2011-08-19" name="date_channel" id="example-date-input">
                    </div>
                </div>
                <hr>
                <h3>Описание</h3>
                <textarea class="form-control" style="padding-bottom: 200px;" name="description_chan" id="first_name"></textarea>
                <hr>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
                <button type="submit" class="btn btn-primary">Сохранить свой канал</button>
            </form>
            <hr>
            <h3>Тут аватар канала</h3>
            @if(isset($chan))
                @if (Storage::disk('local')->has($chan->caption_chan . '-' . $chan->vk_id . '.jpg'))
                <div style="margin-bottom: 10px">
                    <div style="background: url({{ route('accountedit.image',
                ['filename' => $chan->caption_chan . '-' . $chan->vk_id . '.jpg']) }}) 50% 50%; background-size: cover;" class="img_user"></div>
                </div>
                @else
                <div>
                    <H1>Фото не загруженно</H1>
                </div>
                @endif
            @else
                <div>
                    <H1>Фото не загруженно</H1>
                </div>
            @endif
        </div>

    </div>
    </div>
@endsection