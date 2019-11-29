@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Taxonomies</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/taxonomies/create') }}"><i class="fas fa-plus"></i> Create new</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="70%">Taxonomy</th>
						<th width="15%">Created at</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($taxonomies as $value)
						<tr>
							<td>{{ $count++ }}</td>
							<td>{{ $value->taxonomy_name }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center"><a href="{{ url('/admin/taxonomies/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/taxonomies/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection