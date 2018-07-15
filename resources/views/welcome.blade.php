@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')

    <div class="blocLog">
        @include('includes.message-block')
       <div class="col-md-6 blocLog2">
            {{--<h3>Sign In</h3>--}}
            {{--<form action="{{ route('signin') }}" method="post">--}}
                {{--<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">--}}
                    {{--<label for="email">Your E-Mail</label>--}}
                    {{--<input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">--}}
                {{--</div>--}}
                {{--<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">--}}
                    {{--<label for="password">Your Password</label>--}}
                    {{--<input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-primary">Вход</button>--}}
                {{--<input type="hidden"  name="_token" value="{{ Session::token()}}">--}}

            {{--</form>--}}
           <h2><p class="text_up text-center text-muted">Выбери способ входа</p></h2>




                <form action="{{route('vk')}}">
                    <button type="submit" class="btn btnn">
                        <p style="padding: 0px; margin: 0px">ВК</p>
                    </button>
                    <input type="hidden"  name="_token" value="{{ Session::token()}}">
                </form>

                <div>





            </div>
        </div>
    </div>
@endsection
