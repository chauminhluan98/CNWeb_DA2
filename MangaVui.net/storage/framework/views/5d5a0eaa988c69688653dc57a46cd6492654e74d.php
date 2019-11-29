<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
	<title><?php echo e(config('app.name', 'Laravel')); ?></title>
	<link rel="shortcut icon" href="<?php echo e(asset('public/images/premium.png')); ?>" />
	<link rel="dns-prefetch" href="//fonts.gstatic.com" />
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
	<link href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('public/css/fontawesome.css')); ?>" rel="stylesheet" />
	<?php echo $__env->yieldContent('css'); ?>
	<link href="<?php echo e(asset('public/css/custom.css')); ?>" rel="stylesheet" />
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm" style="background-color:#87cefa;">
			<a class="navbar-brand" href="<?php echo e(url('/')); ?>">
				<img src="<?php echo e(asset('public/images/premium.png')); ?>" width="30" height="30" class="d-inline-block align-top" alt="" />
				<?php echo e(config('app.name', 'Laravel')); ?>

			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav mr-auto">
					
				</ul>
				<ul class="navbar-nav ml-auto">
					<?php if(auth()->guard()->guest()): ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo e(route('login')); ?>"><i class="fas fa-sign-in-alt"></i> Login</a>
						</li>
						<?php if(Route::has('register')): ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo e(route('register')); ?>"><i class="fas fa-user-plus"></i> Register</a>
							</li>
						<?php endif; ?>
					<?php else: ?>
						<?php if(Auth::user()->privilege == "admin"): ?>
							<li class="nav-item dropdown">
								<a id="navbarDropdownManager" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									<i class="fas fa-cog"></i> Admin CP <span class="caret"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownManager">
									<a class="dropdown-item" href="<?php echo e(url('/admin/taxonomies')); ?>"><i class="fas fa-fw fa-list"></i> Taxonomies</a>
									<a class="dropdown-item" href="<?php echo e(url('/admin/posts')); ?>"><i class="fas fa-fw fa-newspaper"></i> Posts</a>
									<a class="dropdown-item" href="<?php echo e(url('/admin/comments')); ?>"><i class="fas fa-fw fa-comments"></i> Comments</a>
									<a class="dropdown-item" href="<?php echo e(url('/admin/users')); ?>"><i class="fas fa-fw fa-users"></i> User accounts</a>
								</div>
							</li>
						<?php endif; ?>
						<li class="nav-item dropdown">
							<a id="navbarDropdownUser" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								<i class="fas fa-user-circle"></i> <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownUser">
								<a class="dropdown-item" href="<?php echo e(url('/admin/posts/create')); ?>"><i class="fas fa-fw fa-plus"></i> Create a post</a>
								<a class="dropdown-item" href="<?php echo e(url('/admin/posts/user')); ?>"><i class="fas fa-fw fa-clone"></i> My posts</a>
								<a class="dropdown-item" href="<?php echo e(url('/admin/comments/user')); ?>"><i class="fas fa-fw fa-comment-alt"></i> My comments</a>
								<a class="dropdown-item" href="<?php echo e(url('/admin/users/profile')); ?>"><i class="fas fa-fw fa-user-cog"></i> Setting account</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
							<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post" style="display: none;"><?php echo csrf_field(); ?></form>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>
		<main class="mt-3">
			<?php echo $__env->yieldContent('content'); ?>
		</main>
		<hr class="shadow-sm" />
		<footer>Copyright &copy; <?php echo e(date('Y')); ?> by <?php echo e(config('app.name', 'Laravel')); ?>.</footer>
	</div>
	<script src="<?php echo e(asset('public/js/jquery-3.3.1.slim.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/js/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>"></script>
	<?php echo $__env->yieldContent('javascript'); ?>
</body>
</html><?php /**PATH Z:\Wamp64\www\inews\resources\views/layouts/app.blade.php ENDPATH**/ ?>