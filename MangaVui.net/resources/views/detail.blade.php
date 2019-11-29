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
						<a class="nav-link" href="{{ url('') }}"><i class="fas fa-chevron-left"></i> Về trang trước</a>
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
	<div class="card mb-3 detail">
		<div class="row no-gutters">
			<div class="col-md-3 imgdetail" >
				<img src="../public/images/{{ $comicbook->comic_cover }}" class="card-img" alt="..." >
			</div>
			<div class="col">
				<div class="card-body infodetail">
					<h1>{{ $comicbook->comic_book_title }}</h1>
					<span>Đăng bởi {{ $comicbook->User->name }}</span>
					<div class="views">Lượt xem: {{ $comicbook->comic_book_views }}</div>
					<div class="tags">
						<div class="bold">Thể loại:</div>
						@foreach($category as $value)
						<a href="#">{{ $value->Category->category_name }}</a>
						@endforeach
						<div class="bold">Nội dung:</div>
						{!! $comicbook->comic_book_excerpt !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="card">
		<h5 class="card-header">Dach sách các tập</h5>
		<div class="card-body">
			<div class="list-group">
				@if(count($episode) === 0)
				<div class="alert alert-success" role="alert">
					Các tập truyện đang cập nhật
				</div>
				@else
				@foreach($episode as $value)
				<a href="{{ url('content/' . $comicbook->comic_book_title_slug . '-' . $value->id . '.html') }}" class="list-group-item list-group-item-action list-group-item-success"><i class="far fa-star"></i> {{ $value->episode_title }}</a>
				@endforeach
				@endif
			</div>
		</div>
	</div>
</div>

@endsection
