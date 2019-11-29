<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Cập nhật truyện tranh</div>
		<div class="card-body">
			<form action="<?php echo e(url('/admin/comic_books/edit')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="id" name="id" value="<?php echo e($comic_book->id); ?>" />
				<div class="form-group">
					<label for="comic_book_title">Tên truyện <span class="text-danger font-weight-bold">*</span></label>
					<input id="comic_book_title" type="text" class="form-control <?php $__errorArgs = ['comic_book_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="comic_book_title" value="<?php echo e($comic_book->comic_book_title); ?>" required autocomplete="comic_book_title" />
					<?php $__errorArgs = ['comic_book_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
				<label for="comic_cover">Hình ảnh bìa <span class="text-danger font-weight-bold">*</span></label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><a href="#comic_cover" onclick="BrowseServer()">Chọn hình</a></span>
						</div>
						<input id="comic_cover" type="text" class="form-control <?php $__errorArgs = ['comic_cover'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="comic_cover" value="<?php echo e($comic_book->comic_cover); ?>" required autocomplete="comic_cover" />
						<?php $__errorArgs = ['comic_cover'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="comic_book_excerpt">Tóm tắt</label>
					<textarea id="comic_book_excerpt" class="form-control ckeditor <?php $__errorArgs = ['comic_book_excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="comic_book_excerpt" height="300" ><?php echo e($comic_book->comic_book_excerpt); ?></textarea>
					<?php $__errorArgs = ['comic_book_excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-check mb-3">
					<input class="form-check-input" type="checkbox" id="completed" name="completed" <?php echo e(($comic_book->completed) ? 'checked' : ''); ?> />
					<label class="form-check-label" for="completed">Xác nhận đã hoàn thành toàn bộ truyện.</label>
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Xác nhận</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('public/js/ckeditor/ckeditor.js')); ?>"></script>
	<script src="<?php echo e(asset('public/js/ckfinder/ckfinder.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\inews_v3.0\resources\views/admin/comic_books/edit.blade.php ENDPATH**/ ?>