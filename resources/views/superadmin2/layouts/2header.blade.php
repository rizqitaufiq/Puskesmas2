<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('dashboard.index')}}"><img src="{{ asset('../../medica/img/core-img/logo3.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{route('dashboard.index')}}"><img src="{{ asset('../../medica/img/core-img/plus.png')}}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <a href="{{route('home')}}">Home</a>
<!--                 <button class="search-trigger"><i class="fa fa-search"></i></button> -->
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">1</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">Kamu mempunyai 1 pemberitahuan</p>
                        
                        <a class="dropdown-item media" href="#">
                            <i class="fa fa-warning"></i>
                            <p>Tahun 2014 Puskesmas Dau tidak memenuhi target.</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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