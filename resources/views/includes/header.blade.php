<header>
    <div style="width: 80%; margin: 0 auto">
    <div class="movi">
         <iframe width="940" height="500" id="iframe_player" src=""
                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    </div>
    <nav class="navbar navbar-expand-lg" style="background-color: rgba(0,83,255,0.1); box-shadow: -4px 0px 4px 1px cornflowerblue;
text-shadow: none; margin-left: auto; margin-right: auto">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" id="brand" href="{{ route('dashboard') }}">Brand</a>
            </div>

        <div class="navbar" id="bs-example-navbar-collapse-1">
            <ul class="nav nnavbar-nav navbar-right">
                @if(Auth::user()->isAdmin() == 1)
                    <li class="nav-link" style="text-shadow: none"><a href="{{route('admin')}}">Админка</a></li>
                @endif
                @if(Auth::user())
                    <li class="nav-link" style="text-shadow: none"><a href="{{route('account')}}" style="color: #5e5d5d">Аккаунт</a></li>

                    <li class="nav-link" style="text-shadow: none"><a href="{{route('logout')}}" style="color: #5e5d5d">Выход</a></li>
                @else
                    <li class="nav-link"><a href="{{route('registr')}}"></a></li>
                @endif
            </ul>
        </div>
        </div>
    </nav>
</header>