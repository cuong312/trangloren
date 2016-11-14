<?php get_header(); ?>

<div class="top-image">
	<img src="<?php echo THEME_URL . '/'?>images/single-page-top2.jpg" alt="" />
</div><!-- Page Top Image -->

<section class="page">
	<div class="container">
		<div class="page-title">
			<h1>Blog<span></span></h1>
		</div><!--Page Title-->
	</div>	
	<div class="container">
		<div class="left-content nine-column">
			<?php
				if( have_posts() ) : while ( have_posts() ) :  the_post();
			?>
			<div class="blog-post">
				<h1><?php the_title(); ?></h1>
				<div class="blog-post-details">
					<ul class="post-meta">
						<li><i class="icon-calendar-empty"></i><?php echo $post->post_date;?></li>
						<li><i class="icon-map-marker"></i> Đăng bởi: <?php the_author(); ?></li>
					</ul>
					<div class="post-desc">						
						<p><?php the_excerpt(); ?></p>
					</div>
				</div>
			</div>
			<div class="page-content">
				<?php echo the_content(); ?>
			</div>
			<?php
				endwhile;
				endif;
			?>

			<div>
				<?php 
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div>
			
		</div>
		<div class="sidebar three-column pull-right">
			<?php search_form(); ?>
			<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'main-sidebar' ); ?>
			<?php endif; ?>
		</div>
	</div>
		
</section>

<?php get_footer(); ?>
<?php
	echo "<pre>";
	print_r($wp_query);
?>