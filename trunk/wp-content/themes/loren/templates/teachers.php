<?php
/**
 * Template Name: Trang Giang Vien
 */
?> 

<?php get_header(); ?>

<div class="top-image">
	<img src="<?php echo THEME_URL . '/'?>images/single-page-top2.jpg" alt="" />
</div><!-- Page Top Image -->
	
<section class="page">
	<div class="container">
		<div class="page-title">
			<h1>Giáo viên<span></span></h1>
		</div><!--Page Title-->
	</div>
	
	<?php teacher_list(); ?>
			
</section>

<?php get_footer(); ?>