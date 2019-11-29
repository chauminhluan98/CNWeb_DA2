@extends('layouts.app')

@section('content')
	<div class="card"> 
		<div class="card-header">Danh sách thể loại của " @foreach($name as $value) {{$value->comic_book_title}} @endforeach "</div>
		<div class="card-body">
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">Stt</th>
						<th width="90%">Tên thể loại</th>
						<th width="5%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($comCate as $value)
						<tr>
							<td>{{ $count++ }}</td>
							<td>{{ $value->Category->category_name }}</td>
							<td class="text-center"><a href="{{ url('/admin/comics_categories/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<form action="{{ url('/admin/comics_categories/create') }}" method="post" >
			@csrf
			@foreach($name as $value)
			<input type="hidden" id="id" name="id" value="{{ $value->id }}" />
			@endforeach
			<label for="category_id">Thể loại</label>
			<div class="input-group" >
				<select id="category_id" class="form-control custom-select @error('category_id') is-invalid @enderror" name="category_id" required autofocus>
					<option value="">-- Chọn --</option>
					@foreach($categories as $value)
					<option value="{{ $value->id }}">{{ $value->category_name }}</option>
					@endforeach
				</select>
				@error('category_id')
					<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
				@enderror
				<div class="input-group-append">
					<button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm</button>
				</div>
			</div>
			</form>
		</div>
	</div>
@endsection