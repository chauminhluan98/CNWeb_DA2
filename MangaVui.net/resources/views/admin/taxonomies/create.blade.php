@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Create new taxonomy</div>
		<div class="card-body">
			<form action="{{ url('/admin/taxonomies/create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="taxonomy_name">Taxonomy name <span class="text-danger font-weight-bold">*</span></label>
					<input id="taxonomy_name" type="text" class="form-control @error('taxonomy_name') is-invalid @enderror" name="taxonomy_name" value="{{ old('taxonomy_name') }}" required autocomplete="taxonomy_name" autofocus />
					@error('taxonomy_name')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create new taxonomy</button>
			</form>
		</div>
	</div>
@endsection