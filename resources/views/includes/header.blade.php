<header>
    {{--<img class="imgs" src={{ URL::to('/images/movi.png')}}>--}}
    <div class="movi container">

            <iframe width="960" height="500" src="https://www.youtube.com/embed/73GjdIcU0YI"
                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

    </div>
    <nav class="navbar navbar-default" style="background-color: rgba(0,83,255,0.1); box-shadow: -4px 0px 4px 1px black">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" id="brand" href="{{ route('dashboard') }}">Brand</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
       <!-- /.container-fluid -->
        <div class="navbar" id="bs-example-navbar-collapse-1">
            <ul class="nav nnavbar-nav navbar-right">
                @if(Auth::user())
                    <li class="nav-link" style="text-shadow: none"><a href="{{route('account')}}" style="color: #5e5d5d">Аккаунт</a></li>

                    <li class="nav-link" style="text-shadow: none"><a href="{{route('logout')}}" style="color: #5e5d5d">Выход</a></li>
                @else
                    <li class="nav-link"><a href="{{route('registr')}}"></a></li>
                @endif
            </ul>
        <!-- /.navbar-collapse -->
        </div>
        </div>
    </nav>
</header>