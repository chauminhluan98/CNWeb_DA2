@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xoá thể loại</div>
		<div class="card-body">
			<form action="{{ url('/admin/comics_categories/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $comCate->id }}" />
				<input type="hidden" id="comic_book_id" name="comic_book_id" value="{{ $comCate->comic_book_id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xoá thể loại này không?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/comics_categories') }}/{{$comCate->comic_book_id}}"><i class="fas fa-times"></i> Thôi</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xác nhận</button>
			</form>
		</div>
	</div>
@endsection