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
			<h1>Tin tức<span></span></h1>
		</div><!--Page Title-->
	</div>	
	<div class="container">
		<div class="left-content nine-column">
			<?php
				$args = array(
					'post_type' => 'post',
				);
				$the_query = new WP_Query( $args );
				if( $the_query->have_posts() ) : while ( $the_query->have_posts() ) :  $the_query->the_post();
			?>
			<div class="blog-post">
				<h2><a href="<?php the_permalink()?>" title=""><?php the_title(); ?></a></h2>
				<a class="blog-post-img" href="single-post-image.html" title=""><img src="<?php echo THEME_URL . '/'?>images/blog-post-ws-1.jpg" alt="" /></a>
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
				endif;
			?>
			
			<div class="pagination-area">				
				<div class="pagination-buttons">
					<a href="#" title=""><i class="icon-angle-left"></i></a>
					<a href="#" title=""><i class="icon-angle-right"></i></a>
				</div>
			</div>
			
			
		</div>
		
		<div class="sidebar three-column pull-right">
			<div class="sidebar-widget">
				<div class="sidebar-search">
					<input class="search" type="text" placeholder="Nhập từ khóa tìm kiếm" />
					<input class="search-button" type="submit" value="" />
				</div>
			</div><!-- Sidebar Search -->
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
			</div><!-- Category List -->
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

			</div><!-- Popular Posts -->		
		</div><!-- Sidebar -->
	</div>
		
</section>


<?php get_footer(); ?>