<?php
/**
 * Template Name: Trang Gioi thieu
 */
?> 

<?php get_header(); ?>

<div id="layerslider-container-fw" class="home-slider-top">
	<?php echo do_shortcode("[huge_it_slider id='12']"); ?>
</div>

<?php
	if( have_posts() ) : while ( have_posts() ) : the_post();
?>
<section class="page">
	<div class="container">
		<div class="page-title">
			<h1><?php the_title(); ?><span></span></h1>
		</div><!--Page Title-->
	</div>
	<div class="container .page-content">
		<div class="col-sm-12">
			<?php echo the_content(); ?>
		</div>
	</div>

			
</section>
<?php
	endwhile;
	endif;
?>

<?php get_footer(); ?>
