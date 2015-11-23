<?php get_header(); ?> 

<div id="layerslider-container-fw">
	<?php layerslider(1) ?>

	<div class="message-box">
		<div class="message-box-title">			
			<span><i class="icon-envelope-alt"></i></span>
			<p>Leave A Message</p>
			<i class="icon-angle-up"></i>
		</div>
		<div class="message-form">
			<p>Lorem ipsum dolor sit amet, cons ectetur adipisei ing elit. Pellentesque mi tellus, fringilla nonintedi.</p>
			<form>
				<input class="form-control" type="text" placeholder="Name" />
				<input class="form-control" type="email" placeholder="Email" />
				<textarea class="form-control" rows="3" placeholder="Your Message"></textarea>
				<input class="submit-btn" type="button" value="Submit" />
			</form>
		</div>
	</div><!-- Message Box -->
	
</div><!-- Layer Slider -->	

<div id="carousel-layer-slider" class="carousel slide hide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-layer-slider" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-layer-slider" data-slide-to="1"></li>
		<li data-target="#carousel-layer-slider" data-slide-to="2"></li>
		<li data-target="#carousel-layer-slider" data-slide-to="3"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="<?php echo THEME_URL . '/'?>images/slider1.jpg" class="slider-image">
			<div class="carousel-caption">

			</div>
		</div>
		<div class="item">
			<img src="<?php echo THEME_URL . '/'?>images/slider2.jpg" class="slider-image">
			<div class="carousel-caption">

			</div>
		</div>
		<div class="item">
			<img src="<?php echo THEME_URL . '/'?>images/slider3.jpg" class="slider-image">
			<div class="carousel-caption">

			</div>
		</div>
		<div class="item">
			<img src="<?php echo THEME_URL . '/'?>images/slider4.jpg" class="slider-image">
			<div class="carousel-caption">

			</div>
		</div>

	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-layer-slider" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-layer-slider" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>	



<section class="home-about">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 text-center">
				<a class="about-icon" href="">
					<i class="fa fa-university"></i>
				</a>
				<div class="about-content">
					<p>
						Take computer science courses
						<br>
						with personalized support
					</p>
				</div>
			</div>
			<div class="col-sm-4 text-center">
				<a class="about-icon" href="">
					<i class="fa fa-users"></i>
				</a>
				<div class="about-content">
					<p>
						Take computer science courses
						<br>
						with personalized support
					</p>
				</div>
			</div>
			<div class="col-sm-4 text-center">
				<a class="about-icon" href="">
					<i class="fa fa-graduation-cap"></i>
				</a>
				<div class="about-content">
					<p>
						Take computer science courses
						<br>
						with personalized support
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="home-courses">
	<div class="container">
		<div class="row">
			<h2 class="col-sm-12">Khóa Học</h2>
		</div>
	</div>
	<div class="container">
		<div class="staff couses">
			<div class="row">
				<div class="col-md-3">
					<div class="staff-member cources-member">
						<img src="<?php echo THEME_URL . '/'?>images/courses_1.jpg" alt="" />
						<div class="member-intro" style="background-color: #1eaace;">
							<h3>Workshop pronunciation</h3>
							<span>Level 1</span>
						</div>
						<div class="social-contacts">
							<ul>
								<li class="view-couses"><a href="#" title=""><i class="fa fa-eye"></i></a></li>
								<li class="view-register"><a href="#" title=""><i class="fa fa-pencil-square-o"></i></a></li>
							</ul>
						</div>
					</div>
				</div><!--Staff Member-->
				<div class="col-md-3">
					<div class="staff-member cources-member">
						<img src="<?php echo THEME_URL . '/'?>images/courses_2.jpg" alt="" />
						<div class="member-intro" style="background-color: #1dbb90;">
							<h3>American Accent Training</h3>
							<span>Level 2</span>
						</div>
						<div class="social-contacts">
							<ul>
								<li class="view-couses"><a href="#" title=""><i class="fa fa-eye"></i></a></li>
								<li class="view-register"><a href="#" title=""><i class="fa fa-pencil-square-o"></i></a></li>
							</ul>
						</div>
					</div>
				</div><!--Staff Member-->
				<div class="col-md-3">
					<div class="staff-member cources-member">
						<img src="<?php echo THEME_URL . '/'?>images/courses_5.jpg" alt="" />
						<div class="member-intro" style="background-color: #ffb20e;">
							<h3>Listening and Speaking Part 1</h3>
							<span>Level 3</span>
						</div>
						<div class="social-contacts">
							<ul>
								<li class="view-couses"><a href="#" title=""><i class="fa fa-eye"></i></a></li>
								<li class="view-register"><a href="#" title=""><i class="fa fa-pencil-square-o"></i></a></li>
							</ul>
						</div>
					</div>
				</div><!--Staff Member-->
				<div class="col-md-3">
					<div class="staff-member cources-member">
						<img src="<?php echo THEME_URL . '/'?>images/courses_4.jpg" alt="" />
						<div class="member-intro" style="background-color: #428BCA;">
							<h3>Listening and Speaking Part 2</h3>
							<span>Level 4</span>
						</div>
						<div class="social-contacts">
							<ul>
								<li class="view-couses"><a href="#" title=""><i class="fa fa-eye"></i></a></li>
								<li class="view-register"><a href="#" title=""><i class="fa fa-pencil-square-o"></i></a></li>
							</ul>
						</div>
					</div>
				</div><!--Staff Member-->
			</div>
		</div><!--Staff -->
	</div>
</section>

<section class="home-quoute">
	<div class="container">
		<div class="row">
			<div class="col-sm-12"><h2>Slogan của Trang Loren</h2></div>
			<div class="col-sm-12 text-center">
				<p>“Rồi tôi sẽ nói hay, nhưng
					trước tiên chắc chắn là tôi nói chuẩn”
				</p>
				<p>
					Hãy học với một tâm trí cởi mở để làm mới
					Tiếng Anh của bạn một cách tự nhiên
				</p>
			</div>
		</div>
	</div>
</section>

<section class="home-video">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">				
				<h3 class="home-video-title">Con đường học tiếng anh tại Trang Loren</h3>
				<div class="home-video-content">
					<p>Mauris vitae quam ligula. In tincidunt sapien sed nibh scelerisque congue. Maecenas ut libero eu metus tincidunt lobortis. Duis accumsan at mauris vel lacinia.</p>
				</div>
				<a class="btn btn-info" href="">Xem Chi Tiết</a>
			</div>
			<div class="col-sm-6">
				<div class="home-video-right" style="background-image: url('<?php echo THEME_URL; ?>/images/post_video_border.png')">
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>