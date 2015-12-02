<?php
/**
 * Template Name: Trang Hoc Vien
 */
?> 

<?php get_header(); ?> 

<div class="top-image">
	<img src="<?php echo THEME_URL . '/'?>images/single-page-top2.jpg" alt="" />
</div><!-- Page Top Image -->

<section class="page">
	<div class="container">
		<div class="page-title">
			<h1>Học viên<span></span></h1>
		</div><!--Page Title-->
	</div>	
	<?php student_list(); ?>
		
</section>

<?php get_footer(); ?> 