<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Delete taxonomy</div>
		<div class="card-body">
			<form action="<?php echo e(url('/admin/taxonomies/delete')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="id" name="id" value="<?php echo e($taxonomy->id); ?>" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Are you sure you want to delete taxonomy "<?php echo e($taxonomy->taxonomy_name); ?>"?</p>
				<a class="btn btn-secondary" href="<?php echo e(url('/admin/taxonomies')); ?>"><i class="fas fa-times"></i> Cancel</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\inews_v3.0\resources\views/admin/taxonomies/delete.blade.php ENDPATH**/ ?>