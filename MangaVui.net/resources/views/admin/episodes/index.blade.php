@extends('layouts.app')

@section('content')
	<div class="card"> 
		<div class="card-header">Danh sách các tập của " @foreach($name as $value) {{$value->comic_book_title}} @endforeach "</div>
		<div class="card-body">
			@foreach($name as $value)
			<p><a class="btn btn-primary" href="{{ url('/admin/episodes/create/' . $value->id) }}"><i class="fas fa-plus"></i> Thêm mới</a></p>
			@endforeach
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">Stt</th>
						<th width="80%">Tên tập</th>
						<th width="5%">TTĐ</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($episodes as $value)
						<tr>
							<td>{{ $count++ }}</td>
							<td>{{ $value->episode_title }}</td>
							<td class="text-center">
							@if($user == 'admin')
								@if($value->episode_status == 1)
									<a href="{{ url('/admin/episodes/status/' . $value->id) }}"><i class="fas fa-check text-primary"></i></a>
								@else
									<a href="{{ url('/admin/episodes/status/' . $value->id) }}"><i class="fas fa-ban text-danger"></i></a>
								@endif
							@else
								@if($value->episode_status == 1)
									<i class="fas fa-check text-primary"></i>
								@else
									<i class="fas fa-ban text-danger"></i>
								@endif
							@endif
							</td>
							@if($value->episode_status == 1)
								@if($user == 'admin')
									<td class="text-center"><a href="{{ url('/admin/episodes/edit/' . $value->id) }}" ><i class="fas fa-edit text-primary"></i></a></td>
									<td class="text-center"><a href="{{ url('/admin/episodes/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
								@else
									<td class="text-center"><i class="fas fa-edit text-mute"></i></td>
									<td class="text-center"><i class="fas fa-trash-alt text-mute"></i></td>
								@endif
							@else
								<td class="text-center"><a href="{{ url('/admin/episodes/edit/' . $value->id) }}" ><i class="fas fa-edit text-primary"></i></a></td>
								<td class="text-center"><a href="{{ url('/admin/episodes/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection