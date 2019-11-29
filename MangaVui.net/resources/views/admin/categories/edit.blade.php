@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Cập nhật thể loại</div>
		<div class="card-body">
			<form action="{{ url('/admin/categories/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $category->id }}" />
				<div class="form-group">
					<label for="category_name">Tên thể loại<span class="text-danger font-weight-bold">*</span></label>
					<input id="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ $category->category_name }}" required autocomplete="category_name" autofocus />
					@error('category_name')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Xác nhận</button>
			</form>
		</div>
	</div>
@endsection