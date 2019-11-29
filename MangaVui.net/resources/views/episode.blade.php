@extends('layouts.front-end')

@section('content')
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top nav-rep">
		<div class="container">
			<a class="navbar-brand" href="{{ url('') }}">{{ config('app.name', 'Laravel') }}</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-lg-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('detail/'.$epi->ComicBook->comic_book_title_slug . '-' . $epi->ComicBook->id . '.html') }}"><i class="fas fa-chevron-left"></i> Về trang trước</a>
					</li>
					@guest
					<li class="nav-item active login-out">
						<a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
					</li>
					@else
					<li class="nav-item active login-out">
						<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ Auth::user()->name }} (Đăng xuất)</a>
						<form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">@csrf</form>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
</header>
<div class="container">
	<div class="card episode mb-3">
		<h5 class="card-header title">{{ $epi->episode_title }}</h5>
	</div>
</div>
<div class="container epcon">
	{!! $epi->episode_content !!}
</div>



@endsection
