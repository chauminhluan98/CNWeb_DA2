<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Home</div>
		<div class="card-body">
			<?php if(session('status')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo e(session('status')); ?>

				</div>
			<?php endif; ?>
			<p class="card-text">Welcome to Laravel...</p>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\Wamp64\www\inews\resources\views/home.blade.php ENDPATH**/ ?>