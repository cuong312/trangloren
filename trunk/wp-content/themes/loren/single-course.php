<?php get_header(); ?>

<div class="top-image">
	<img src="<?php echo THEME_URL . '/'?>images/single-page-top2.jpg" alt="" />
</div><!-- Page Top Image -->

<section class="page">
	<div class="container">
		<div class="page-title">
			<h1>Chi tiết khóa học<span></span></h1>
		</div><!--Page Title-->
	</div>
	<?php
		if( have_posts() ) : while ( have_posts() ) : the_post();
	?>
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
	<?php
		endwhile;
		endif;
	?>
</section>

<?php get_footer(); ?>
