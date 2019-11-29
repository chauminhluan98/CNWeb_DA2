<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Cập nhật thể loại</div>
		<div class="card-body">
			<form action="<?php echo e(url('/admin/categories/edit')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="id" name="id" value="<?php echo e($category->id); ?>" />
				<div class="form-group">
					<label for="category_name">Tên thể loại<span class="text-danger font-weight-bold">*</span></label>
					<input id="category_name" type="text" class="form-control <?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_name" value="<?php echo e($category->category_name); ?>" required autocomplete="category_name" autofocus />
					<?php $__errorArgs = ['category_name'];
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\inews_v3.0\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>