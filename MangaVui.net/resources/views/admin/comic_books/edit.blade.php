@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Cập nhật truyện tranh</div>
		<div class="card-body">
			<form action="{{ url('/admin/comic_books/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $comic_book->id }}" />
				<div class="form-group">
					<label for="comic_book_title">Tên truyện <span class="text-danger font-weight-bold">*</span></label>
					<input id="comic_book_title" type="text" class="form-control @error('comic_book_title') is-invalid @enderror" name="comic_book_title" value="{{ $comic_book->comic_book_title }}" required autocomplete="comic_book_title" />
					@error('comic_book_title')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
				<label for="comic_cover">Hình ảnh bìa <span class="text-danger font-weight-bold">*</span></label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><a href="#comic_cover" onclick="BrowseServer()">Chọn hình</a></span>
						</div>
						<input id="comic_cover" type="text" class="form-control @error('comic_cover') is-invalid @enderror" name="comic_cover" value="{{ $comic_book->comic_cover }}" required autocomplete="comic_cover" />
						@error('comic_cover')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				<div class="form-group">
					<label for="comic_book_excerpt">Tóm tắt</label>
					<textarea id="comic_book_excerpt" class="form-control ckeditor @error('comic_book_excerpt') is-invalid @enderror" name="comic_book_excerpt" height="300" >{{ $comic_book->comic_book_excerpt }}</textarea>
					@error('comic_book_excerpt')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-check mb-3">
					<input class="form-check-input" type="checkbox" id="completed" name="completed" {{ ($comic_book->completed) ? 'checked' : '' }} />
					<label class="form-check-label" for="completed">Xác nhận đã hoàn thành toàn bộ truyện.</label>
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Xác nhận</button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
	<script type="text/javascript">
		function BrowseServer()
		{
			var finder = new CKFinder();
			finder.basePath = '../';
			finder.selectActionFunction = function(fileUrl) {
				document.getElementById('comic_cover').value = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
			};
			finder.popup();
		}
	</script>
@endsection