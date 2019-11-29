@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Create new post</div>
		<div class="card-body">
			<form action="{{ url('/admin/posts/create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="taxonomy_id">Taxonomy <span class="text-danger font-weight-bold">*</span></label>
					<select id="taxonomy_id" class="form-control custom-select @error('taxonomy_id') is-invalid @enderror" name="taxonomy_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($taxonomies as $value)
							<option value="{{ $value->id }}">{{ $value->taxonomy_name }}</option>
						@endforeach
					</select>
					@error('taxonomy_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="post_title">Post title <span class="text-danger font-weight-bold">*</span></label>
					<input id="post_title" type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" value="{{ old('post_title') }}" required autocomplete="post_title" />
					@error('post_title')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="post_excerpt">Post excerpt</label>
					<textarea id="post_excerpt" class="form-control @error('post_excerpt') is-invalid @enderror" name="post_excerpt">{{ old('post_excerpt') }}</textarea>
					@error('post_excerpt')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="post_content">Post content <span class="text-danger font-weight-bold">*</span></label>
					<textarea id="post_content" class="form-control ckeditor @error('post_content') is-invalid @enderror" name="post_content" required>{{ old('post_content') }}</textarea>
					@error('post_content')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-check mb-3">
					<input class="form-check-input" type="checkbox" id="comment_status" name="comment_status" {{ old('comment_status') ? 'checked' : '' }} />
					<label class="form-check-label" for="comment_status">Allow user post comments.</label>
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create new post</button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection