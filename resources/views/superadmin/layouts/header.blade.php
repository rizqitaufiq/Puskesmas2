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
                <div style="display: none;">
                    {!! $notif = \Illuminate\Support\Facades\DB::table('notif')
                            ->where('notif.id_puskesmas', Auth::user()->puskesmas)
                            ->join('program', 'program.id', '=', 'notif.id_program')
                            ->select('program.nama_program', 'notif.tahun', 'notif.id_program')
                            ->get(); !!}
                </div>
                @if(!$notif->isEmpty())
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">{{count($notif)}}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">Kamu mempunyai {{count($notif)}} pemberitahuan</p>
                            @foreach($notif as $notif2)
                            <a class="dropdown-item media" href="{{route ('notif', $notif2->id_program)}}">
                                <i class="fa fa-warning"></i>
                                <p>Tahun {{$notif2->tahun}} {{$notif2->nama_program}} tidak memenuhi target.</p>
                            </a>
                            @endforeach
                    </div>
                </div>
                @else
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                    </button>
                     <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="dropdown-item media" style="font-size: 15px; font-weight: 400">Kamu mempunyai tidak pemberitahuan</p>
                    </div>
                    
                </div>
                @endif
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