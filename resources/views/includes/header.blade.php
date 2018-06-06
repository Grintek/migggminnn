<header>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #0d3625;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=".navbar-expand-{breakpoint}">
                <a class="navbar-brand" id="brand" href="{{ route('dashboard') }}">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="row">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-link"><a href="{{route('account')}}">Account</a></li>
                    <li class="nav-link"><a href="{{route('logout')}}">Logout</a></li>
                </ul>
                </form>
            </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container-fluid -->
    </nav>
</header>