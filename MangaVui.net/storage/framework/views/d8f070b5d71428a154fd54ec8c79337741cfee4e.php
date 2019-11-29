<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Thể loại</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="<?php echo e(url('/admin/categories/create')); ?>"><i class="fas fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">Stt</th>
						<th width="70%">Thể loại</th>
						<th width="15%">Thời điểm</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xoá	</th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($count++); ?></td>
							<td><?php echo e($value->category_name); ?></td>
							<td><?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s')); ?></td>
							<td class="text-center"><a href="<?php echo e(url('/admin/categories/edit/' . $value->id)); ?>"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/admin/categories/delete/' . $value->id)); ?>" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\MangaVui.net\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>