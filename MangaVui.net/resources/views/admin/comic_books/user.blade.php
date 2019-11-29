@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Truyện tranh</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/comic_books/create') }}"><i class="fas fa-plus"></i> Thêm truyện</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">Stt</th>
						<th width="15%">Người đăng</th>
						<th width="10%">Ảnh bìa</th>
						<th width="18%">Tiêu đề</th>
						<th width="6%">Thể loại</th>
						<th width="6%">Chi tiết</th>
						<th width="10%">Lượt xem</th>
						<th width="10%">Thời điểm</th>
						<th width="5%" title="Trạng thái đăng (bật/tắt)">TTĐ</th>
						<th width="5%" title="Hoàn thành (bật/tắt)">TTHT</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($comic_books as $value)
						<tr>
							<td>{{ $count++ }}</td>
							<td>{{ $value->User->name }}</td>
							<td class='text-center'><img src="{{ asset('public/images') }}/{{ $value->comic_cover }}" width="60" /></td>
							<td>{{ $value->comic_book_title }}</td>
							<td class="text-center"><a href="{{ url('/admin/comics_categories/' . $value->id) }}"><i class="fas fa-inbox"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/episodes/' . $value->id) }}"><i class="fas fa-inbox"></i></a></td>
							<td>{{ $value->comic_book_views }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center">
								@if($value->comic_book_status == 1)
									<i class="fas fa-check text-primary"></i>
								@else
									<i class="fas fa-ban text-danger"></i>
								@endif
							</td>
							<td class="text-center">
								@if($value->completed == 1)
									<a href="{{ url('/admin/comic_books/completed/' . $value->id) }}"><i class="fas fa-check"></i></a>
								@else
									<a href="{{ url('/admin/comic_books/completed/' . $value->id) }}"><i class="fas fa-ban text-danger"></i></a>
								@endif
							</td>
							@if($value->comic_book_status == 1)
								<td class="text-center"><i class="fas fa-edit text-muted"></i></td>
								<td class="text-center"><i class="fas fa-trash-alt text-muted"></i></td>
							@else
								<td class="text-center"><a href="{{ url('/admin/comic_books/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
								<td class="text-center"><a href="{{ url('/admin/comic_books/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection