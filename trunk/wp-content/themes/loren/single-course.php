<?php get_header(); ?>
<?php
		if( have_posts() ) : while ( have_posts() ) : the_post();
		$imageShortCode = get_post_meta( get_the_ID(), 'short_code_slider', true );
	?>
<div id="layerslider-container-fw" class="home-slider-top">
	<?php echo do_shortcode($imageShortCode); ?>
</div>

<section class="page">
	<div class="container">
		<div class="page-title">
			<h1>Chi tiết khóa học<span></span></h1>
		</div><!--Page Title-->
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="teacher-name-title"><?php the_title(); ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 teacher-content">
				<?php echo the_content(); ?>
			</div>
		</div>
	</div>
	
</section>
<?php
		endwhile;
		endif;
	?>
<?php get_footer(); ?>
