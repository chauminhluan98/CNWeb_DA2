@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xoá {{ $episode->episode_title }} </div>
		<div class="card-body">
			<form action="{{ url('/admin/episodes/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $episode->id }}" />
				<input type="hidden" id="comic_book_id" name="comic_book_id" value="{{ $episode->comic_book_id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xoá " {{ $episode->episode_title }}" không?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/episodes') }}/{{$episode->comic_book_id}}"><i class="fas fa-times"></i> Thôi</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xác nhận</button>
			</form>
		</div>
	</div>
@endsection