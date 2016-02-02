<?php
/**
 * Template Name: Trang Tin Tuc
 */
?> 

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
				// the query to set the posts per page to 3
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			?>
			<?php
				$args = array(
					'post_type' => 'post',
					'paged' => $paged,
				);
				query_posts($args);
				if( have_posts() ) : while ( have_posts() ) :  the_post();
			?>
			<div class="blog-post">
				<h2><a href="<?php the_permalink()?>" title=""><?php the_title(); ?></a></h2>
				<?php 
					$thumbnailImageUrl = ( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) )!= '' ) ? wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ): THEME_URL . '/images/blog-post-ws-1.jpg';
				?>
				<a class="blog-post-img-new" href="<?php the_permalink()?>" title=""><div class="image-post-div" style="background-image: url('<?php echo $thumbnailImageUrl;?>');"> </div></a>
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
			<?php
				endwhile;
				?>
					<div class="pagination-area">				
						<div class="pagination-buttons">
							<?php previous_posts_link('<i class="icon-angle-left"></i>'); ?>
							<?php next_posts_link('<i class="icon-angle-right"></i>'); ?>
						</div>
					</div>
				<?php 
				endif;
			?>
			
			
			
		</div>
		
		<div class="sidebar three-column pull-right">
			<!-- <div class="sidebar-widget">
				<div class="sidebar-search">
					<input class="search" type="text" placeholder="Nhập từ khóa tìm kiếm" />
					<input class="search-button" type="submit" value="" />
				</div>
			</div>
			<div class="sidebar-widget">
				<div class="sidebar-title">
					<h4>Chủ đề</h4>
				</div>
				<ul class="sidebar-list">
					<li><a href="#" title="">Khóa học</a></li>
					<li><a href="#" title="">Giảng viên</a></li>
					<li><a href="#" title="">Học viên</a></li>
					<li><a href="#" title="">Bài học</a></li>
					<li><a href="#" title="">Hoạt động</a></li>
				</ul>
			</div>
			<div class="sidebar-widget">
				<div class="sidebar-title">
					<h4>Bài viết xem nhiều nhất</h4>
				</div>
				<div class="popular-post">
					<img src="<?php echo THEME_URL . '/'?>images/popular-post1.jpg" alt="" />
					<div class="popular-post-title">
						<h6><a href="#" title="">Quisque Sit Amet Unte</a></h6>
						<span>May 3,2013 / 02 comments</span>
					</div>
				</div>
				<div class="popular-post">
					<img src="<?php echo THEME_URL . '/'?>images/popular-post2.jpg" alt="" />
					<div class="popular-post-title">
						<h6><a href="#" title="">Quisque Sit Amet Unte</a></h6>
						<span>May 3,2013 / 02 comments</span>
					</div>
				</div>

			</div>	 -->
			<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'main-sidebar' ); ?>
			<?php endif; ?>
		</div>
	</div>
		
</section>


<?php get_footer(); ?>