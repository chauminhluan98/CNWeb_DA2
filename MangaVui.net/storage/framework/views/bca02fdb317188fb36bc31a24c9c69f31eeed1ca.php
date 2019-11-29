<?php $__env->startSection('content'); ?>
	<div class="card"> 
		<div class="card-header">Danh sách thể loại của " <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($value->comic_book_title); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> "</div>
		<div class="card-body">
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">Stt</th>
						<th width="90%">Tên thể loại</th>
						<th width="5%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					<?php $__currentLoopData = $comCate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($count++); ?></td>
							<td><?php echo e($value->Category->category_name); ?></td>
							<td class="text-center"><a href="<?php echo e(url('/admin/comics_categories/delete/' . $value->id)); ?>" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<form action="<?php echo e(url('/admin/comics_categories/create')); ?>" method="post" >
			<?php echo csrf_field(); ?>
			<?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<input type="hidden" id="id" name="id" value="<?php echo e($value->id); ?>" />
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<label for="category_id">Thể loại</label>
			<div class="input-group" >
				<select id="category_id" class="form-control custom-select <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_id" required autofocus>
					<option value="">-- Chọn --</option>
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($value->id); ?>"><?php echo e($value->category_name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
				<?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
					<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
				<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				<div class="input-group-append">
					<button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm</button>
				</div>
			</div>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\inews_v3.0\resources\views/admin/comics_categories/index.blade.php ENDPATH**/ ?>