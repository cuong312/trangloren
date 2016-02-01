<?php
/**
 * Template Name: Lịch khai giảng
 */
?> 

<?php get_header(); ?>

<div id="layerslider-container-fw" class="home-slider-top">
	<?php echo do_shortcode("[huge_it_slider id='13']"); ?>
</div>
	
<section class="page">
	<div class="container">
		<div class="page-title">
			<h1>Lịch khai <span>giảng</span></h1>
		</div><!-- Page Title -->

		<?php home_khoahoc_lichhoc(); ?>

		<div class="col-sm-6">
			<div class="form">
				<h3 class="sub-head">Thông tin cá nhân</h3>
				<p>Những trường đánh dấu <span>*</span> là bắt buộc.</p>
				<form>
					<label>Họ và tên <span>*</span></label>
					<input type="text" class="form-control input-field" />
					<label>Điện thoại <span>*</span></label>
					<input type="phone" class="form-control input-field" />
					<label>Email <span>*</span></label>
					<input type="email" class="form-control input-field" />
					<label>Số điện thoại của các bạn học theo nhóm </label>
					<textarea rows="3" class="form-control input-field"></textarea>
					<input type="submit" class="form-button" value="ĐĂNG KÝ" />
				</form>
			
			</div>
		</div>	<!-- Message Form -->
	</div>	
</section>
<?php get_footer(); ?>

