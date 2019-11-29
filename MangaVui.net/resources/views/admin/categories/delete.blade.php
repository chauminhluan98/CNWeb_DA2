@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xoá thể loại</div>
		<div class="card-body">
			<form action="{{ url('/admin/categories/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $category->id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xoá thể loại "{{ $category->category_name }}" không?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/categories') }}"><i class="fas fa-times"></i> Thôi</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xác nhận</button>
			</form>
		</div>
	</div>
@endsection