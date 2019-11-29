<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Truyện tranh</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="<?php echo e(url('/admin/comic_books/create')); ?>"><i class="fas fa-plus"></i> Thêm truyện</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">Stt</th>
						<th width="15%">Người đăng</th>
						<th width="10%">Ảnh bìa</th>
						<th width="18%">Tiêu đề</th>
						<th width="6%">Thể loại</th>
						<th width="6%">Chi tiết</th>
						<th width="10%">Lượt xem</th>
						<th width="10%">Thời điểm</th>
						<th width="5%" title="Trạng thái đăng (bật/tắt)">TTĐ</th>
						<th width="5%" title="Hoàn thành (bật/tắt)">TTHT</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					<?php $__currentLoopData = $comic_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($count++); ?></td>
							<td><?php echo e($value->User->name); ?></td>
							<td class='text-center'><img src="<?php echo e(asset('public/images')); ?>/<?php echo e($value->comic_cover); ?>" width="60" /></td>
							<td><?php echo e($value->comic_book_title); ?></td>
							<td class="text-center"><a href="<?php echo e(url('/admin/comics_categories/' . $value->id)); ?>"><i class="fas fa-inbox"></i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/admin/episodes/' . $value->id)); ?>"><i class="fas fa-inbox"></i></a></td>
							<td><?php echo e($value->comic_book_views); ?></td>
							<td><?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s')); ?></td>
							<td class="text-center">
								<?php if($value->comic_book_status == 1): ?>
									<a href="<?php echo e(url('/admin/comic_books/status/' . $value->id)); ?>"><i class="fas fa-check"></i></a>
								<?php else: ?>
									<a href="<?php echo e(url('/admin/comic_books/status/' . $value->id)); ?>"><i class="fas fa-ban text-danger"></i></a>
								<?php endif; ?>
							</td>
							<td class="text-center">
								<?php if($value->completed == 1): ?>
									<a href="<?php echo e(url('/admin/comic_books/completed/' . $value->id)); ?>"><i class="fas fa-check"></i></a>
								<?php else: ?>
									<a href="<?php echo e(url('/admin/comic_books/completed/' . $value->id)); ?>"><i class="fas fa-ban text-danger"></i></a>
								<?php endif; ?>
							</td>
							<td class="text-center"><a href="<?php echo e(url('/admin/comic_books/edit/' . $value->id)); ?>"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/admin/comic_books/delete/' . $value->id)); ?>" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\MangaVui.net\resources\views/admin/comic_books/index.blade.php ENDPATH**/ ?>