<?php
/**
 * Template Name: Trang Hoc Vien
 */
?> 

<?php get_header(); ?> 

<div id="layerslider-container-fw" class="home-slider-top">
	<?php echo do_shortcode("[huge_it_slider id='4']"); ?>
</div>
<section class="page">
	<div class="container">
		<div class="page-title">
			<h1>Học viên<span></span></h1>
		</div><!--Page Title-->
	</div>	
	<?php student_list(); ?>
		
</section>

<?php get_footer(); ?> 