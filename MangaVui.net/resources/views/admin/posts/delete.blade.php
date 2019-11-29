@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Delete post</div>
		<div class="card-body">
			<form action="{{ url('/admin/posts/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $post->id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Are you sure you want to delete post "{{ $post->post_title }}"?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/posts/user') }}"><i class="fas fa-times"></i> Cancel</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
			</form>
		</div>
	</div>
@endsection