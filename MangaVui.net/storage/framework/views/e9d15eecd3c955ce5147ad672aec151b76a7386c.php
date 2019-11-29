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
						<a class="nav-link" href="<?php echo e(url('detail/'.$epi->ComicBook->comic_book_title_slug . '-' . $epi->ComicBook->id . '.html')); ?>"><i class="fas fa-chevron-left"></i> Về trang trước</a>
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
	<div class="card episode mb-3">
		<h5 class="card-header title"><?php echo e($epi->episode_title); ?></h5>
	</div>
</div>
<div class="container epcon">
	<?php echo $epi->episode_content; ?>

</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\MangaVui.net\resources\views/episode.blade.php ENDPATH**/ ?>