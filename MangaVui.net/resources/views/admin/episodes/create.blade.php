@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm tập mới</div>
		<div class="card-body">
			<form action="{{ url('/admin/episodes/create') }}" method="post">
				@csrf
				<input type="hidden" id="comic_book_id" name="comic_book_id" value="{{ $id }}" />
				<div class="form-group">
					<label for="episode_title">Tên tập <span class="text-danger font-weight-bold">*</span></label>
					<input id="episode_title" type="text" class="form-control @error('episode_title') is-invalid @enderror" name="episode_title" value="{{ old('episode_title') }}" required autocomplete="episode_title" />
					@error('episode_title')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="episode_content">Nội dung <span class="text-danger font-weight-bold">*</span></label>
					<textarea id="episode_content" class="form-control ckeditor @error('episode_content') is-invalid @enderror" name="episode_content" required>{{ old('episode_content') }}</textarea>
					@error('episode_content')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Xác nhận</button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection
