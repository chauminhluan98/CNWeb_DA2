<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">My posts</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="<?php echo e(url('/admin/posts/create')); ?>"><i class="fas fa-plus"></i> Create new</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="10%">Taxonomy</th>
						<th width="50%">Title</th>
						<th width="5%">Views</th>
						<th width="10%">Created at</th>
						<th width="5%" title="Post status">PS</th>
						<th width="5%" title="Comment status">CS</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($count++); ?></td>
							<td><?php echo e($value->Taxonomy->taxonomy_name); ?></td>
							<td><?php echo e($value->post_title); ?></td>
							<td><?php echo e($value->post_views); ?></td>
							<td><?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s')); ?></td>
							<td class="text-center">
								<?php if($value->post_status == 1): ?>
									<i class="fas fa-check text-primary"></i>
								<?php else: ?>
									<i class="fas fa-ban text-danger"></i>
								<?php endif; ?>
							</td>
							<td class="text-center">
								<?php if($value->comment_status == 1): ?>
									<i class="fas fa-check text-primary"></i>
								<?php else: ?>
									<i class="fas fa-ban text-danger"></i>
								<?php endif; ?>
							</td>
							<?php if($value->post_status == 1): ?>
								<td class="text-center"><i class="fas fa-edit text-muted"></i></td>
								<td class="text-center"><i class="fas fa-trash-alt text-muted"></i></td>
							<?php else: ?>
								<td class="text-center"><a href="<?php echo e(url('/admin/posts/edit/' . $value->id)); ?>"><i class="fas fa-edit"></i></a></td>
								<td class="text-center"><a href="<?php echo e(url('/admin/posts/delete/' . $value->id)); ?>" ><i class="fas fa-trash-alt text-danger"></i></a></td>
							<?php endif; ?>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\Wamp\www\inews_v2.0\resources\views/admin/posts/user.blade.php ENDPATH**/ ?>