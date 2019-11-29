<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">User accounts</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="<?php echo e(url('/admin/users/create')); ?>"><i class="fas fa-plus"></i> Create new</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="20%">Name</th>
						<th width="15%">Username</th>
						<th width="20%">Email</th>
						<th width="10%">Privilege</th>
						<th width="15%">Created at</th>
						<th width="5%">Status</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($count++); ?></td>
							<td><?php echo e($value->name); ?></td>
							<td><?php echo e($value->username); ?></td>
							<td><?php echo e($value->email); ?></td>
							<td>
								<?php if($value->privilege == "admin"): ?>
									<span class="badge badge-primary">Administrator</span>
								<?php else: ?>
									<span class="badge badge-secondary">User</span>
								<?php endif; ?>
							</td>
							<td><?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s')); ?></td>
							<td class="text-center">
								<?php if($value->user_status == 1): ?>
									<a href="<?php echo e(url('/admin/users/status/' . $value->id)); ?>"><i class="fas fa-check"></i></a>
								<?php else: ?>
									<a href="<?php echo e(url('/admin/users/status/' . $value->id)); ?>"><i class="fas fa-ban text-danger"></i></a>
								<?php endif; ?>
							</td>
							<td class="text-center"><a href="<?php echo e(url('/admin/users/edit/' . $value->id)); ?>"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/admin/users/delete/' . $value->id)); ?>" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\Wamp64\www\inews_v1.0\resources\views/admin/users/index.blade.php ENDPATH**/ ?>