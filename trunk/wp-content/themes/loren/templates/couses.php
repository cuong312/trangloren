<?php
/**
 * Template Name: Trang Khoa Hoc
 */
?> 

<?php get_header(); ?> 

<div class="top-image">
	<img src="<?php echo THEME_URL . '/'?>images/single-page-top2.jpg" alt="" />
</div>

<section class="page">
	<div class="container">
		<div class="page-title">
			<h1>Khóa học<span></span></h1>
		</div><!--Page Title-->
	</div>
	
	<?php home_khoahoc(); ?> 
			
</section>

<?php get_footer(); ?> 