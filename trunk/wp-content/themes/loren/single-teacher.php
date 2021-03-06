<?php get_header(); ?>

<div id="layerslider-container-fw" class="home-slider-top">
	<?php echo do_shortcode("[huge_it_slider id='5']"); ?>
</div>

<section class="page">
	<div class="container">
		<div class="page-title">
			<h1>Giáo viên<span></span></h1>
		</div><!--Page Title-->
	</div>
	<?php
		if( have_posts() ) : while ( have_posts() ) : the_post();
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h3 class="teacher-name-title"><?php the_title(); ?></h3>
				<h4 class="teacher-job-title"><?php echo get_post_meta( get_the_ID(), 'cong_viec', true ); ?></h4>
				<div>
					<p class="tearch-info"><?php echo $wp_query->post->post_excerpt; ?></p>
					<p class="tearch-contact">Email: <a href="mailto:<?php echo get_post_meta( get_the_ID(), 'email', true ); ?>"><?php echo get_post_meta( get_the_ID(), 'email', true ); ?></a></p>
					<p class="tearch-contact">Phone: <?php echo get_post_meta( get_the_ID(), 'dien_thoai', true ); ?></p>

				</div>
			</div>
			<div class="col-sm-6">
				<div class="teacher-image" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(), 'medium' ) ); ?>');">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 teacher-content">
				<?php echo the_content(); ?>
			</div>
		</div>
	</div>
	<?php
		endwhile;
		endif;
	?>
</section>

<?php get_footer(); ?>
