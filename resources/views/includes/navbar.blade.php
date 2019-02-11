<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @auth
                    <li>
                        <a href="#" id="sidebarCollapse">
                            <i class="glyphicon glyphicon-align-left"></i>
                        </a>
                    </li>
                    <li {{Request::segment(1) == "" ? "class=active" : ""}}><a href="/">Dashboard</a></li>
                    <li {{Request::segment(1) == "statistics" ? "class=active" : ""}}><a href="/statistics">Crime Statistics</a></li>
                    <li class="hidden" {{Request::segment(1) == "convicts-gallery" ? "class=active" : ""}}><a href="/convicts-gallery">Convicted Gallery</a></li>
                    <li class="hidden" {{Request::segment(1) == "suspects-gallery" ? "class=active" : ""}}><a href="/suspects-gallery">Suspects Gallery</a></li>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{-- {{ Auth::user()->name }} --}}
                            <i class="glyphicon glyphicon-menu-hamburger"></i> <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="hidden">
                                <a href="#">Profile</a>
                            </li>
                            <li {{Request::segment(1) == "crimetype" ? "class=active" : ""}}>
                                <a href="{{ route('crimetype.index') }}">Crimes</a>
                            </li>
                            <li {{Request::segment(1) == "officers" ? "class=active" : ""}}>
                                <a href="{{ route('officers.index') }}">Officers</a>
                            </li>
                            <li {{Request::segment(1) == "investigators" ? "class=active" : ""}}>
                                <a href="{{ route('investigators.index') }}">Investigators</a>
                            </li>
                            {{--  <li {{Request::segment(1) == "equipments" ? "class=active" : ""}}>
                                <a href="{{ route('equipments.index') }}">Equipments</a>
                            </li> --}}
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            if(confirm('Are you sure you want to log out?')) {

                                             document.getElementById('logout-form').submit();
                                         }">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>