@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">My posts</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/posts/create') }}"><i class="fas fa-plus"></i> Create new</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="10%">Taxonomy</th>
						<th width="50%">Title</th>
						<th width="5%">Views</th>
						<th width="10%">Created at</th>
						<th width="5%" title="Post status">PS</th>
						<th width="5%" title="Comment status">CS</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($posts as $value)
						<tr>
							<td>{{ $count++ }}</td>
							<td>{{ $value->Taxonomy->taxonomy_name }}</td>
							<td>{{ $value->post_title }}</td>
							<td>{{ $value->post_views }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center">
								@if($value->post_status == 1)
									<i class="fas fa-check text-primary"></i>
								@else
									<i class="fas fa-ban text-danger"></i>
								@endif
							</td>
							<td class="text-center">
								@if($value->comment_status == 1)
									<i class="fas fa-check text-primary"></i>
								@else
									<i class="fas fa-ban text-danger"></i>
								@endif
							</td>
							@if($value->post_status == 1)
								<td class="text-center"><i class="fas fa-edit text-muted"></i></td>
								<td class="text-center"><i class="fas fa-trash-alt text-muted"></i></td>
							@else
								<td class="text-center"><a href="{{ url('/admin/posts/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
								<td class="text-center"><a href="{{ url('/admin/posts/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection