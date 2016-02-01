<?php
/**
 * Template Name: Trang Khoa Hoc
 */
?> 

<?php get_header(); ?> 

<?php
	if( have_posts() ) : while ( have_posts() ) : the_post();
	$imageUrl = wp_get_attachment_url( get_post_meta( get_the_ID(), 'anh_banner', true ));
?>
<div id="layerslider-container-fw" class="home-slider-top">
	<?php echo do_shortcode("[huge_it_slider id='6']"); ?>
</div>

<section class="page">
	<div class="container page-content">
		<div class="page-title">
			<h1>Khóa học<span></span></h1>
		</div><!--Page Title-->
	</div>
	
	<?php home_khoahoc(); ?> 
			
</section>
<?php
	endwhile;
	endif;
?>
<?php get_footer(); ?> 