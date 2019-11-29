<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Cập nhật</div>
		<div class="card-body">
			<form action="<?php echo e(url('/admin/episodes/edit')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="id" name="id" value="<?php echo e($episode->id); ?>" />
				<input type="hidden" id="comic_book_id" name="comic_book_id" value="<?php echo e($episode->comic_book_id); ?>" />
				<div class="form-group">
					<label for="episode_title">Tên tập <span class="text-danger font-weight-bold">*</span></label>
					<input id="episode_title" type="text" class="form-control <?php $__errorArgs = ['episode_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="episode_title" value="<?php echo e($episode->episode_title); ?>" required autocomplete="episode_title" />
					<?php $__errorArgs = ['episode_title'];
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
					<label for="episode_content">Nội dung <span class="text-danger font-weight-bold">*</span></label>
					<textarea id="episode_content" class="form-control ckeditor <?php $__errorArgs = ['episode_content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="episode_content" required><?php echo e($episode->episode_content); ?></textarea>
					<?php $__errorArgs = ['episode_content'];
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
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Xác nhận</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('public/js/ckeditor/ckeditor.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\inews_v3.0\resources\views/admin/episodes/edit.blade.php ENDPATH**/ ?>