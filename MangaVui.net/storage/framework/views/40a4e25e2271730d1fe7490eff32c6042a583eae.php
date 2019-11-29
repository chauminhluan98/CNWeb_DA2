<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Xoá thể loại</div>
		<div class="card-body">
			<form action="<?php echo e(url('/admin/categories/delete')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="id" name="id" value="<?php echo e($category->id); ?>" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xoá thể loại "<?php echo e($category->category_name); ?>" không?</p>
				<a class="btn btn-secondary" href="<?php echo e(url('/admin/categories')); ?>"><i class="fas fa-times"></i> Thôi</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xác nhận</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\inews_v3.0\resources\views/admin/categories/delete.blade.php ENDPATH**/ ?>