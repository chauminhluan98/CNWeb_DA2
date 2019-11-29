@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Delete taxonomy</div>
		<div class="card-body">
			<form action="{{ url('/admin/taxonomies/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $taxonomy->id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Are you sure you want to delete taxonomy "{{ $taxonomy->taxonomy_name }}"?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/taxonomies') }}"><i class="fas fa-times"></i> Cancel</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
			</form>
		</div>
	</div>
@endsection