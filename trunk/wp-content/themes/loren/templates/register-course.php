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
		<form class="register-student-form">

		<?php home_khoahoc_lichhoc(); ?>

		<div class="col-sm-6">
			<div class="form">
				<h3 class="sub-head">Thông tin cá nhân</h3>
				<input type='text' class="hide" name="action" value="register_course">
				<p>Những trường đánh dấu <span>*</span> là bắt buộc.</p>
				<label>Họ và tên <span>*</span></label>
				<input type="text" name="name" class="form-control input-field" />
				<label>Điện thoại <span>*</span></label>
				<input type="phone" name="phone" class="form-control input-field" />
				<label>Email</label>
				<input type="email" name="email" class="form-control input-field" />
				<label>Số điện thoại của các bạn học theo nhóm </label>
				<textarea rows="3" name="phone_group" class="form-control input-field"></textarea>
				<label>Thời gian bạn có thể học được: </label>
				<textarea rows="3" name="thoi_gian" class="form-control input-field"></textarea>
				<div class="success-box">					
					
				</div>
				<input type="button" class="form-button submit-click" value="ĐĂNG KÝ" />			
			</div>
		</div>	<!-- Message Form -->
		</form>
	</div>	
</section>
<script type="text/javascript">
	jQuery(document).ready(function() {

		jQuery(document).on('click', '.submit-click', function() {

			jQuery.ajax({
				type: "POST",
				url: '/wp-admin/admin-ajax.php',
				data: jQuery('.register-student-form').serialize(),
				dataType: 'json',
				beforeSend: function(xhr, settings) {
					jQuery('.page').addClass('blur-loading');
					jQuery('.success-box').empty();
				},
				success: function(response, status, xhr) {
					console.log(response);
					if ( response.status == 1) {						
						var htmlElement = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Đăng ký thành công, chúng tôi sẽ sớm liên hệ với bạn.</div>';
						jQuery('.input-field').val('');
						jQuery('.success-box').html(htmlElement);
					} else {
						var htmlElement = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Vui lòng chọn khóa học và điền đầy đủ các trường bắt buộc.</div>';
						jQuery('.success-box').html(htmlElement);					
					}

				},
				complete: function(xhr, status) {
					jQuery('.page').removeClass('blur-loading');
				},
				error: function (xhr, ajaxOptions, thrownError) {	

				}
			});

		});

	});
</script>
<?php get_footer(); ?>


