<?php $__env->startSection('content'); ?>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top nav-rep">
		<div class="container">
			<a class="navbar-brand" href="<?php echo e(url('')); ?>"><?php echo e(config('app.name', 'Laravel')); ?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-lg-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fas fa-chevron-left"></i> Về trang trước</a>
					</li>
					<?php if(auth()->guard()->guest()): ?>
					<li class="nav-item active login-out">
						<a class="nav-link" href="<?php echo e(route('login')); ?>">Đăng nhập</a>
					</li>
					<?php else: ?>
					<li class="nav-item active login-out">
						<a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><?php echo e(Auth::user()->name); ?> (Đăng xuất)</a>
						<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post" style="display: none;"><?php echo csrf_field(); ?></form>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
</header>
<div class="container">
	<div class="card mb-3 detail">
		<div class="row no-gutters">
			<div class="col-md-3 imgdetail" >
				<img src="../public/images/<?php echo e($comicbook->comic_cover); ?>" class="card-img" alt="..." >
			</div>
			<div class="col">
				<div class="card-body infodetail">
					<h1><?php echo e($comicbook->comic_book_title); ?></h1>
					<span>Đăng bởi <?php echo e($comicbook->User->name); ?></span>
					<div class="views">Lượt xem: <?php echo e($comicbook->comic_book_views); ?></div>
					<div class="tags">
						<div class="bold">Thể loại:</div>
						<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<a href="#"><?php echo e($value->Category->category_name); ?></a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<div class="bold">Nội dung:</div>
						<?php echo $comicbook->comic_book_excerpt; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="card">
		<h5 class="card-header">Dach sách các tập</h5>
		<div class="card-body">
			<div class="list-group">
				<?php if(count($episode) === 0): ?>
				<div class="alert alert-success" role="alert">
					Các tập truyện đang cập nhật
				</div>
				<?php else: ?>
				<?php $__currentLoopData = $episode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<a href="<?php echo e(url('content/' . $comicbook->comic_book_title_slug . '-' . $value->id . '.html')); ?>" class="list-group-item list-group-item-action list-group-item-success"><i class="far fa-star"></i> <?php echo e($value->episode_title); ?></a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\MangaVui.net\resources\views/detail.blade.php ENDPATH**/ ?>