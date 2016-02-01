<?php get_header(); ?>
<?php
		if( have_posts() ) : while ( have_posts() ) : the_post();
		$imageUrl = wp_get_attachment_url( get_post_meta( get_the_ID(), 'anh_banner', true ));
	?>
<div class="top-image top-image-course-detail" style="background-image: url('<?php echo $imageUrl; ?>')">
</div><!-- Page Top Image -->

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
