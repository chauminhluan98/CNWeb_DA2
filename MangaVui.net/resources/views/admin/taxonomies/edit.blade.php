@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Edit a taxonomy</div>
		<div class="card-body">
			<form action="{{ url('/admin/taxonomies/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $taxonomy->id }}" />
				<div class="form-group">
					<label for="taxonomy_name">Taxonomy name <span class="text-danger font-weight-bold">*</span></label>
					<input id="taxonomy_name" type="text" class="form-control @error('taxonomy_name') is-invalid @enderror" name="taxonomy_name" value="{{ $taxonomy->taxonomy_name }}" required autocomplete="taxonomy_name" autofocus />
					@error('taxonomy_name')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
			</form>
		</div>
	</div>
@endsection