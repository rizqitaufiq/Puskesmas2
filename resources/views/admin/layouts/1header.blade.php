<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            {{-- <a class="navbar-brand" href="./"><img src="{{ asset('../../ela/images/logo.png')}}" alt="Logo"></a> --}}
            <a class="navbar-brand" href="./"><img src="{{ asset('../../medica/img/core-img/logo.png')}}" alt="Logo"></a>
            {{-- <a class="navbar-brand hidden" href="./"><img src="{{ asset('../../ela/images/logo2.png')}}" alt="Logo"></a> --}}
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('../../medica/img/core-img/plus.png')}}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
            <a href="{{route('home')}}">Home admin</a>
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>
            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hai, {{ Auth::user()->nama }}
                </a>

                <div class="user-menu dropdown-menu">
                    
                        @if (Route::has('login'))
                            @auth
                                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                
                            @endauth
                        @endif
                    
                </div>
            </div>

        </div>
    </div>
</header>