<?php get_header(); ?> 

<div id="layerslider-container-fw" class="home-slider-top">
	<?php echo do_shortcode("[huge_it_slider id='2']"); ?>

	<div class="message-box hide">
		<div class="message-box-title">			
			<span><i class="icon-envelope-alt"></i></span>
			<p>Leave A Message</p>
			<i class="icon-angle-up"></i>
		</div>
	</div><!-- Message Box -->
	
</div><!-- Layer Slider -->	

<!-- Home About Section -->
<?php home_about_secction(); ?> 
<!-- End Home About Section -->

<section class="home-courses">
	<div class="container">
		<div class="row">
			<h2 class="col-sm-12">Khóa Học</h2>
		</div>
	</div>
	<?php home_khoahoc(); ?>
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
	<?php home_video(1391); ?>
</section>

<section class="testimonial">
	<?php home_testimonial(); ?> 
</section>	<!-- Testimonials -->

<section class="home-news">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h5>Lịch học</h5>
				<div class="news-event" style="background-color: #65BDE4;">
					<div>
						<i class="fa fa-thumb-tack"></i> Khai Giảng Workshop k24
					</div>
					<div>
						<i class="fa fa-clock-o"> 7:00 to 9:30</i> <i class="fa fa-calendar"> 01/12/2015</i> 
					</div>
				</div>
				<div class="news-event" style="background-color: #1dbb90;">
					<div>
						<i class="fa fa-thumb-tack"></i> Khai Giảng Workshop k24
					</div>
					<div>
						<i class="fa fa-clock-o"> 7:00 to 9:30</i> <i class="fa fa-calendar"> 01/12/2015</i> 
					</div>
				</div>
				<div class="news-event" style="background-color: #ffb20e;">
					<div>
						<i class="fa fa-thumb-tack"></i> Khai Giảng Workshop k24
					</div>
					<div>
						<i class="fa fa-clock-o"> 7:00 to 9:30</i> <i class="fa fa-calendar"> 01/12/2015</i> 
					</div>
				</div>
				<div class="news-event" style="background-color: #428BCA;">
					<div>
						<i class="fa fa-thumb-tack"></i> Khai Giảng Workshop k24
					</div>
					<div>
						<i class="fa fa-clock-o"> 7:00 to 9:30</i> <i class="fa fa-calendar"> 01/12/2015</i> 
					</div>
				</div>
				<div class="news-event" style="background-color: #4FC0AA;">
					<div>
						<i class="fa fa-thumb-tack"></i> Khai Giảng Workshop k24
					</div>
					<div>
						<i class="fa fa-clock-o"> 7:00 to 9:30</i> <i class="fa fa-calendar"> 01/12/2015</i> 
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<h5>Hoạt động</h5>
				<?php baiviet_footer(); ?>
			</div>
			<div class="col-md-4">
				<h5>Bài Học</h5>
				<div class="news-item">
					<div class="news-thumbnail">
						<img src="<?php echo THEME_URL . '/'?>images/flickr1.jpg">
					</div>
					<div class="news-content">
						<div class="news-title">Bắt đầu học tiếng anh với Workshop Pronunciation</div>
						<div class="news-info">
							<span>25/05/2015</span> đăng bởi <span>Thắng Đoàn</span>
						</div>
					</div>
				</div>
				<div class="news-item">
					<div class="news-thumbnail">
						<img src="<?php echo THEME_URL . '/'?>images/flickr1.jpg">
					</div>
					<div class="news-content">
						<div class="news-title">Bắt đầu học tiếng anh với Workshop Pronunciation</div>
						<div class="news-info">
							<span>25/05/2015</span> đăng bởi <span>Thắng Đoàn</span>
						</div>
					</div>
				</div>
				<div class="news-item">
					<div class="news-thumbnail">
						<img src="<?php echo THEME_URL . '/'?>images/flickr1.jpg">
					</div>
					<div class="news-content">
						<div class="news-title">Bắt đầu học tiếng anh với Workshop Pronunciation</div>
						<div class="news-info">
							<span>25/05/2015</span> đăng bởi <span>Thắng Đoàn</span>
						</div>
					</div>
				</div>
				<div class="news-item">
					<div class="news-thumbnail">
						<img src="<?php echo THEME_URL . '/'?>images/flickr1.jpg">
					</div>
					<div class="news-content">
						<div class="news-title">Bắt đầu học tiếng anh với Workshop Pronunciation</div>
						<div class="news-info">
							<span>25/05/2015</span> đăng bởi <span>Thắng Đoàn</span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</section>

<?php get_footer(); ?>