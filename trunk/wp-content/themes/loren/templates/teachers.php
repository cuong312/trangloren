<?php
/**
 * Template Name: Trang Giang Vien
 */
?> 

<?php get_header(); ?>

<div id="layerslider-container-fw" class="home-slider-top">
	<?php echo do_shortcode("[huge_it_slider id='5']"); ?>
</div>
	
<section class="page">
	<div class="container">
		<div class="page-title">
			<h1>Giảng viên<span></span></h1>
		</div><!--Page Title-->
	</div>
	
	<?php teacher_list(); ?>
			
</section>

<?php get_footer(); ?>