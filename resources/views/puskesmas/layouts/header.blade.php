<!-- Start Header Area -->
<header class="default-header">
	<nav class="navbar navbar-expand-lg  navbar-light">
		<div class="container">
			<a class="navbar-brand" href="{{ route('home')}}">
				<img src="{{ asset('../../medica/img/core-img/logo2.png')}}" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
				<ul class="navbar-nav">
								
					@if (Route::has('login'))
						@auth
							<li class="dropdown">
								<a href="{{route('dashboard.index')}}">Dashboard</a>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
									Hai, {{ Auth::user()->nama }}
								</a>
								<div class="dropdown-menu">
									<a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@else
							<li><a href="{{ route('puskesmas.lihatdata')}}">Lihat Data</a></li>
							<li><a href="{{ route('login') }}">Login</a></li>
						@endauth
					@endif				
				</ul>
			</div>						
		</div>
	</nav>
</header>
<!-- End Header Area -->