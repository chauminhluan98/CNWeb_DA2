@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thể loại</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/categories/create') }}"><i class="fas fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">Stt</th>
						<th width="70%">Thể loại</th>
						<th width="15%">Thời điểm</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xoá	</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($categories as $value)
						<tr>
							<td>{{ $count++ }}</td>
							<td>{{ $value->category_name }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center"><a href="{{ url('/admin/categories/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/categories/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection