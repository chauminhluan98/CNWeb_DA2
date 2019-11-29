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
						<a class="nav-link" href="#home">Trang chủ <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#explore">Thịnh hành</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#adventure">Đăng kí</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#blog">Danh sách</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#contact">Góp ý</a>
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
<div class="jumbotron jumbotron-fluid height100p banner" id="home">
	<div class="container h100">
		<div class="contentBox h100">
			<div>
				<h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0"><?php echo e(config('app.name', 'Laravel')); ?>.net</h1>
				<p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">Website đọc truyện tranh trực tiếp Mangavui.net mến chào các bạn đến với kho truyện tranh lớn nhất, đầy đủ nhất và cật nhật nhanh nhất Việt Nam hiện nay :)...</p>
			</div>
		</div>
	</div>
</div>
<section class="sec1" id="explore">
	<div class="container">
		<div class="row">
			<div class="offset-sm-2 col-sm-8">
				<div class="headerText text-center">
					<h2>Top truyện tranh hàng đầu</h2>
					<p>Chúng tôi luôn đem cho bạn những gì mà mọi người đang quan tâm đến, đừng ngần ngại với nguồn cảm hứng từ cộng đồng, đây là danh sách mà một trong số đó có thể là thứ bạn đang tìm kiếm...</p>
				</div>
			</div>
		</div>
		<div class="row swiper">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php $__currentLoopData = $topcb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="swiper-slide">
						<div class="imgBx">
							<?php if($choose === 0): ?>
							<img src="public/images/<?php echo e($value->comic_cover); ?>">
							<?php else: ?>
							<img src="../public/images/<?php echo e($value->comic_cover); ?>">
							<?php endif; ?>
						</div>
						<div class="details">
							<h3><?php echo e(Str::words($value->comic_book_title, 5, '...')); ?><br>
								<span><a href="<?php echo e(url('detail/'.$value->comic_book_title_slug . '-' . $value->id . '.html')); ?>">Xem truyện>></a></span></h3>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
		</div>
	</div>
</section>
<?php if(auth()->guard()->guest()): ?>
<section class="sec2" id="adventure">
	<div class="container h100">
		<div class="contentBox h100">
			<div>
				<h2>Chúng tôi luôn cần bạn</h2>
				<p>Hãy nhớ rằng đây là nơi mọi người chia sẽ và tham gia bài viết, bạn muốn có bộ truyện tranh cho mình, bạn muốn đóng góp và bình luận cho các tập truyện yêu thích, vật còn chần chờ chi nữa Đăng kí tham gia ngay thôi...</p>
				<a href="<?php echo e(route('register')); ?>" class="btn btnD1">Đăng kí tài khoản</a>
			</div>
		</div>	
	</div>
</section>
<?php endif; ?>
<section class="blog" id="blog">
	<div class="container">
		<div class="row">
			<div class="offset-sm-2 col-sm-8">
				<div class="headerText text-center">
					<h2>Thư viện truyện tranh</h2>
					<p>Đây là tổng hợp các sản phẩm hiện có đã và đang cập nhật liên tục cho các bạn. Đến đây bạn có thể lựa cho mình thể loại yêu thích nhất. Dưới đây có gì nào...</p>
				</div>
			</div>
		</div>
		<div class="container catetories">
			<div class="nav-scroller py-1 mb-2">
				<nav class="nav d-flex justify-content-between">
					<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<a class="p-2" href="<?php echo e(url('choose/' . $value->category_slug . '-' . $value->id . '.html')); ?>"><?php echo e($value->category_name); ?></a>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</nav>
			</div>
		</div>
		<?php if($choose ===0): ?>
		<div class="row">
			<?php $__currentLoopData = $comicbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="blogpost">
					<div class="imgBx">
						<img src="public/images/<?php echo e($value->comic_cover); ?>" class="img-fluid">
					</div>
					<div class="content">
						<h5><a href="<?php echo e(url('detail/'.$value->comic_book_title_slug . '-' . $value->id . '.html')); ?>"><?php echo e(Str::words($value->comic_book_title, 5, '...')); ?></a><br><span>Đăng bởi <?php echo e($value->User->name); ?></span></h5>
						<div class="views">Lượt xem: <?php echo e($value->comic_book_views); ?></div>
						<div class="tags">
							<h5>Thể loại:</h5>
							<?php $__currentLoopData = $comic_cate[$value->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="#"><?php echo e($value->Category->category_name); ?></a>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<div class="paginate-outer"><?php echo e($comicbooks->links()); ?></div>
		<?php else: ?>
		<div class="row">
			<?php $__currentLoopData = $comicbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="blogpost">
					<div class="imgBx">
						<img src="../public/images/<?php echo e($value->ComicBook->comic_cover); ?>" class="img-fluid">
					</div>
					<div class="content">
						<h5><a href="<?php echo e(url('detail/'.$value->ComicBook->comic_book_title_slug . '-' . $value->id . '.html')); ?>"><?php echo e(Str::words($value->ComicBook->comic_book_title, 5, '...')); ?></a><br><span>Đăng bởi <?php echo e($value->ComicBook->User->name); ?></span></h5>
						<div class="views">Lượt xem: <?php echo e($value->ComicBook->comic_book_views); ?></div>
						<div class="tags">
							<h5>Thể loại:</h5>
							<?php $__currentLoopData = $comic_cate[$value->ComicBook->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="#"><?php echo e($value->Category->category_name); ?></a>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<div class="paginate-outer"><?php echo e($comicbooks->links()); ?></div>
		<?php endif; ?>
	</div>
</section>
<section class="contact" id="contact">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="headerText text-center">
					<h2>Đóng góp ý kiến</h2>
					<p>Chúng tôi luôn nâng cao trải nghiệm người dùng, đừng ngần ngại, hãy cho chúng tôi biết bạn cần gì...</p>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="offset-sm-2 col-sm-8">
				<form>
					<div class="form-group">
						<label>Họ và tên</label>
						<input type="text" name="" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="" class="form-control">
					</div>
					<div class="form-group">
						<label>Số điện thoại</label>
						<input type="text" name="" class="form-control">
					</div>
					<div class="form-group">
						<label>Nội dung đóng góp</label>
						<textarea class="form-control textarea" name=""></textarea>
					</div>
					<div class="form-group text-center">
						<button class="btn btnD1">Gửi tin</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front-end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\MangaVui.net\resources\views/front-end.blade.php ENDPATH**/ ?>