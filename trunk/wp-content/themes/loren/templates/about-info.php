<?php
/**
 * Template Name: Trang Gioi thieu
 */
?> 

<?php get_header(); ?>

<div class="top-image about-image">
	<img src="<?php echo THEME_URL . '/'?>images/about-page-top.jpg" alt="" />
</div><!-- Page Top Image -->

<?php
	if( have_posts() ) : while ( have_posts() ) : the_post();
?>
<section class="page">
	<div class="container">
		<div class="page-title">
			<h1><?php the_title(); ?><span></span></h1>
		</div><!--Page Title-->
	</div>
	<div class="container">
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
