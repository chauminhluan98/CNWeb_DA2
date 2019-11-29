@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xoá truyện tranh</div>
		<div class="card-body">
			<form action="{{ url('/admin/comic_books/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $comic_book->id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xoá truyện tranh "{{ $comic_book->comic_book_title }}" không?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/comic_books') }}"><i class="fas fa-times"></i> Thôi</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xác nhận</button>
			</form>
		</div>
	</div>
@endsection