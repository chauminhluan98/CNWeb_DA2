<?php $__env->startSection('content'); ?>
	<div class="card"> 
		<div class="card-header">Danh sách các tập của " <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($value->comic_book_title); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> "</div>
		<div class="card-body">
			<?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p><a class="btn btn-primary" href="<?php echo e(url('/admin/episodes/create/' . $value->id)); ?>"><i class="fas fa-plus"></i> Thêm mới</a></p>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">Stt</th>
						<th width="80%">Tên tập</th>
						<th width="5%">TTĐ</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					<?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($count++); ?></td>
							<td><?php echo e($value->episode_title); ?></td>
							<td class="text-center">
							<?php if($user == 'admin'): ?>
								<?php if($value->episode_status == 1): ?>
									<a href="<?php echo e(url('/admin/episodes/status/' . $value->id)); ?>"><i class="fas fa-check text-primary"></i></a>
								<?php else: ?>
									<a href="<?php echo e(url('/admin/episodes/status/' . $value->id)); ?>"><i class="fas fa-ban text-danger"></i></a>
								<?php endif; ?>
							<?php else: ?>
								<?php if($value->episode_status == 1): ?>
									<i class="fas fa-check text-primary"></i>
								<?php else: ?>
									<i class="fas fa-ban text-danger"></i>
								<?php endif; ?>
							<?php endif; ?>
							</td>
							<?php if($value->episode_status == 1): ?>
								<?php if($user == 'admin'): ?>
									<td class="text-center"><a href="<?php echo e(url('/admin/episodes/edit/' . $value->id)); ?>" ><i class="fas fa-edit text-primary"></i></a></td>
									<td class="text-center"><a href="<?php echo e(url('/admin/episodes/delete/' . $value->id)); ?>" ><i class="fas fa-trash-alt text-danger"></i></a></td>
								<?php else: ?>
									<td class="text-center"><i class="fas fa-edit text-mute"></i></td>
									<td class="text-center"><i class="fas fa-trash-alt text-mute"></i></td>
								<?php endif; ?>
							<?php else: ?>
								<td class="text-center"><a href="<?php echo e(url('/admin/episodes/edit/' . $value->id)); ?>" ><i class="fas fa-edit text-primary"></i></a></td>
								<td class="text-center"><a href="<?php echo e(url('/admin/episodes/delete/' . $value->id)); ?>" ><i class="fas fa-trash-alt text-danger"></i></a></td>
							<?php endif; ?>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\MangaVui.net\resources\views/admin/episodes/index.blade.php ENDPATH**/ ?>