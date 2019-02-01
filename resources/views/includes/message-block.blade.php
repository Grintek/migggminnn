@if(count($errors) > 0)
    <div class="error" style="    width: 40%;
    position: fixed;
    left: 30%;
    top: 50%;
    padding: 10px;">
        <div class="baner_exit">
            <div class="baner_exit_cross" style="transform: rotate(45deg);"></div>
            <div class="baner_exit_cross" style="transform: rotate(135deg);"></div>
        </div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
    </div>
@endif
@if(Session::has('message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4 success">
            {{Session::get('message')}}
        </div>
    </div>
@endif