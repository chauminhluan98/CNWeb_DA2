@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm thể loại mới</div>
		<div class="card-body">
			<form action="{{ url('/admin/categories/create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="category_name">Tên thể loại <span class="text-danger font-weight-bold">*</span></label>
					<input id="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name') }}" required autocomplete="category_name" autofocus />
					@error('category_name')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Xác nhận</button>
			</form>
		</div>
	</div>
@endsection