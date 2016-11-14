<?php
define('THEME_URL', get_template_directory_uri());
require_once( get_stylesheet_directory() . '/core/options.php' );
// Load the parent theme sytlesheet

function theme_enqueue_styles() {

	// Load Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.css' );
	wp_enqueue_style( 'font-awesome-cdn','https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'new-sltyle', get_template_directory_uri() . '/css/newstyle.css' );
	wp_enqueue_style( 'responsive-stylesheet', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.1.9.1.js');
	wp_enqueue_script( 'testimonials', get_template_directory_uri() . '/js/testimonials.js');
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/script.js');
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.js');
	wp_enqueue_script( 'carouFredSel-script', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js');
	wp_enqueue_script( 'styleswitcher-script', get_template_directory_uri() . '/js/styleswitcher.js');
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/*
	Khai bao chuc nang cua theme
*/
if ( !function_exists('cuongbui_theme_setup') ) {
	function cuongbui_theme_setup () {

		/* Thiet lap textdomain */
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain( 'cuongbui', $language_folder );

		/* Tu dong them link RSS len <head>*/
		add_theme_support( 'automatic-feed-links' );

		/* Theme post thumbnail */
		add_theme_support( 'post-thumbnails' );

		/* Post Format*/
		add_theme_support( 'post-formats', array(
				'image',
				'video',
				'gallery',
				'quote',
				'link'
			) );

		/* Theme title-tag */
		add_theme_support( 'title-tag' );

		/* Them menu */
		register_nav_menu( 'primary-menu', __('Primary Menu', 'cuongbui') );

		/* Tao side bar */
		$sidebar = array(
			'name' => __('Main Sidebar', 'cuongbui'),
			'id' => 'main-sidebar',
			'description' => __('Default sidebar'),
			'class' => 'sidebar-list',
			'before_widget' => '<div class="sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title' => '<div class="sidebar-title"><h4>',
			'after_title' => '</h4></div>'
			);
		register_sidebar( $sidebar );



	}
	add_action( 'init', 'cuongbui_theme_setup');
}

/* Thiet lap menu */

if (! function_exists( 'cuongbui_menu' ) ) {
	function cuongbui_menu ($menu) {
		$menu = array(
			'theme_location' => $menu,
			'container' => 'nav',
			'container_class' => 'navbar menu',
			'items_wrap' => '
							<div class="navbar-header">
						      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						    </div>

						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul id="menu-navigation">%3$s</ul>
							</div> '
			);
		wp_nav_menu( $menu );
	}
}

/* Chen logo image */

if ( ! function_exists( 'cuongbui_logo' ) ) {

	function cuongbui_logo() {

		global $loren_options;

		if ( isset( $loren_options['logo-image']['url'] ) ) {
			echo $loren_options['logo-image']['url'];
		} else {
			echo THEME_URL . '/images/logo.png';
		}
	}
}

add_filter( 'cuongbui_logo', 'cuongbui_logo' );

/* Dia chi lien he */

if ( ! function_exists( 'cuongbui_lienhe' ) ) {
	function cuongbui_lienhe() {
		global $loren_options;

		$diachi = isset($loren_options['home-address']) ? $loren_options['home-address'] : 'Tầng 4, nhà 54 Lê Thanh Nghị, Hà Nội';
		$dienthoai = isset($loren_options['home-phone']) ? $loren_options['home-phone'] : '0962.885.249 / +00 034 965 353';
		$email = isset($loren_options['home-email']) ? $loren_options['home-email'] : 'trangloren@gmail.com';
		$facebook = isset($loren_options['home-facebook']) ? $loren_options['home-facebook'] : 'http:://facebook.com/trangloren';
		?>
		<ul class="contact-details">
			<li>
				<span><i class="icon-home"></i>ĐỊA CHỈ</span>
				<p><?php echo $diachi; ?></p>
			</li>
			<li>
				<span><i class="icon-phone-sign"></i>ĐIỆN THOẠI</span>
				<p><?php echo $dienthoai; ?></p>
			</li>
			<li>
				<span><i class="icon-envelope-alt"></i>EMAIL</span>
				<p><?php echo $email; ?></p>
			</li>
			<li>
				<span><i class="icon-link"></i>FACEBOOK</span>
				<p><?php echo $facebook; ?></p>
			</li>
		</ul>
		<?php
	}
}


/* Home About */
if ( !function_exists( 'home_about_secction' ) ) {
	function home_about_secction() {
		global $loren_options;
		$home_about_default = 'Take computer science courses
								<br>
								with personalized support default';
		$home_about_1 = isset( $loren_options['home-about-1'] ) ? $loren_options['home-about-1'] : $home_about_default;
		$home_about_2 = isset( $loren_options['home-about-2'] ) ? $loren_options['home-about-2'] : $home_about_default;
		$home_about_3 = isset( $loren_options['home-about-3'] ) ? $loren_options['home-about-3'] : $home_about_default;
		?>
		<section class="home-about">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 text-center">
						<a class="about-icon" href="<?php echo $loren_options['home-about-1-link']?>">
							<i class="fa fa-university"></i>
						</a>
						<div class="about-content">
							<p>
								<?php echo $home_about_1; ?>
							</p>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<a class="about-icon" href="<?php echo $loren_options['home-about-2-link']?>">
							<i class="fa fa-users"></i>
						</a>
						<div class="about-content">
							<p>
								<?php echo $home_about_2; ?>
							</p>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<a class="about-icon" href="<?php echo $loren_options['home-about-3-link']?>">
							<i class="fa fa-graduation-cap"></i>
						</a>
						<div class="about-content">
							<p>
								<?php echo $home_about_3; ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}


/* Liet ke khoa hoc */

function home_khoahoc() {
	$args = array(
		'post_type' => 'course',
		'order' => 'ASC'
	);

	if ( is_home() ) {
		$args = array(
			'post_type' => 'course',
			'posts_per_page' => 4,
			'order' => 'ASC'
		);
	}

	$backgroundString = 'background_color';
	?>

	<div class="container">
		<div class="staff couses">
			<div class="row">
				<?php
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
				?>

					<div class="col-sm-6 col-md-3 cources-box">
						<div class="staff-member cources-member">
							<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>" alt="" />
							<a href="<?php the_permalink()?>">
								<div class="member-intro" style="background-color: <?php echo get_post_meta( get_the_ID(), $backgroundString, true );?>;">
									<h3><?php the_title(); ?></h3>
								</div>
							</a>
							<div class="social-contacts">
								<ul>
									<li class="view-couses"><a href="<?php the_permalink()?>" title=""><i class="fa fa-eye"></i></a></li>
									<li class="view-register"><a href="/lich-khai-giang" title=""><i class="fa fa-pencil-square-o"></i></a></li>
								</ul>
							</div>
						</div>
					</div>

				<?php
					endwhile;
				endif;
				?>

			</div>
		</div><!--Staff -->
	</div>
	<?php

}

/* Liet ke giang vien */

function teacher_list() {
	$args = array(
		'post_type' => 'teacher',
	);
	?>
	<div class="container">
		<div class="staff">
			<div class="row">
				<?php
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
				?>
				<div class="col-md-3">
					<div class="staff-member">
						<div class="staff-image" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(), 'medium' ) ); ?>')"></div>
						<a href="<?php the_permalink()?>">
							<div class="member-intro teacher-info">
								<h3><?php the_title(); ?></h3>
								<span><?php echo get_post_meta( get_the_ID(), 'cong_viec', true );?></span>
							</div>
						</a>
						<div class="social-contacts">
							<ul>
								<li><a href="<?php echo get_post_meta( get_the_ID(), 'facebook', true );?>" title=""><img src="<?php echo THEME_URL . '/'?>images/facebook.jpg" alt="" /></a></li>
								<li><a href="#" title=""><img src="<?php echo THEME_URL . '/'?>images/gplus.jpg" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
					endwhile;
				endif;
				?>
			</div>
		</div><!--Staff -->
	</div>
	<?php
}

/* Liet ke hoc vien */

function student_list() {
	$args = array(
		'post_type' => 'student',
	);
	?>
	<div class="container">
		<div class="causes-page">
			<div class="row">
				<?php
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
				?>
				<div class="col-sm-4 col-md-3">
					<div class="causes-image">
						<div class="student-image" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(), 'medium' ) ); ?>')"></div>
						<div class="cause-heading">
							<h3><?php the_title(); ?></h3>
							<p><?php echo get_post_meta( get_the_ID(), 'truong_hoc', true );?></p>
						</div>
						<div class="our-causes-hover">
							<h3>Cảm nhận sau khóa học</h3>
							<p><?php echo get_post_meta( get_the_ID(), 'cam_nhan', true );?></p>
						</div>
					</div>
				</div>

				<?php
					endwhile;
				endif;
				?>

			</div>
		</div>
	</div>
	<?php
}

/* Hien thi testimonial */

function home_testimonial() {
	$args = array(
		'post_type' => 'feedback',
	);
	?>
	<div class="container">
		<div class="slideshow">
			<ul class="slides">
				<?php
				$the_query = new WP_Query( $args );
				$count = 1;
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
				?>
				<li style="<?php echo $count == 1 ? 'visibility:visible' : ''?>" class="slide" id="image<?php echo $count++;?>">
					<div class="carusal-image-thumb">
					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(), 'medium' ) ); ?>" alt="thumb1" />
					<strong><?php the_title(); ?>,</strong>
					<span class="carusal-image-thumb-name"> <?php echo get_post_meta( get_the_ID(), 'cong_viec', true );?> </span>
					</div>
					<p><?php echo get_post_meta( get_the_ID(), 'phan_hoi', true );?></p>
				</li><!-- Messgae1 -->
				<?php
					endwhile;
				endif;
				?>
			</ul>
			<ul class="buttons">
				<li class="active" id="button1"><a></a></li>
				<li id="button2"><a  title=""></a></li>
				<li id="button3"><a title=""></a></li>
				<li id="button4"><a title=""></a></li>
			</ul>
		</div>
	</div>
	<?php
}

/* Hien thi các bài viết ở footer */

function baiviet_footer($categoryId) {
	$args = array(
		'post_type' => 'post',
		'category__in' => $categoryId,
		'posts_per_page' => 4,
	);
	?>
	<?php
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
	?>
	<div class="news-item">
		<?php $imageURL = ( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) != '' ) ? wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) : THEME_URL . '/images/photo.jpg';?>
		<div class="news-thumbnail" style="background-image: url('<?php echo $imageURL?>');">

		</div>
		<div class="news-content">
			<div class="news-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></div>
			<div class="news-info">
				<span><?php the_date('d/m/Y');?></span> đăng bởi <span><?php the_author(); ?></span>
			</div>
		</div>
	</div>
	<?php
		endwhile;
	endif;
}


/* Hien thi lịch học ở footer */

function lichhoc_footer() {
	$args = array(
		'post_type' => 'schedule',
		'posts_per_page' => 5,
	);
	$colorArray = array(
		'#65BDE4',
		'#1dbb90',
		'#ffb20e',
		'#428BCA',
		'#4FC0AA'
		);
	$iColor = 0;
	?>
	<?php
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
	?>

	<div class="news-event" style="background-color: <?php echo $colorArray[$iColor++]?>;">
		<div>
			<i class="fa fa-thumb-tack"></i> Khai Giảng <?php the_title(); ?>
		</div>
		<div>
			<i class="fa fa-clock-o"> <?php echo get_post_meta( get_the_ID(), 'gio_khai_giang', true );?></i> <i class="fa fa-calendar"> <?php echo get_post_meta( get_the_ID(), 'khai_giang', true );?></i>
		</div>
	</div>
	<?php
		endwhile;
	endif;
}
/* Custom active menu */

function my_special_nav_class( $classes, $item ) {
    if ( in_array('current-menu-item', $classes) ) {
        $classes[] = 'active';
    }

    if ( get_post_type() == 'teacher' &&  $item->ID == 38) {
		$classes[] = 'active';
    }

    if ( is_single() && get_post_type() == 'post' &&  $item->ID == 42) {
		$classes[] = 'active';
    }

    if ( get_post_type() == 'course' &&  $item->ID == 41) {
		$classes[] = 'active';
    }

    if ( ( get_the_ID() == 1391 || get_the_ID() == 1388 ) &&  $item->ID == 39) {
		$classes[] = 'active';
    }

    return $classes;

}

add_filter( 'nav_menu_css_class', 'my_special_nav_class', 10, 2 );


/* Add home video */
function home_video( $id ) {

	$postVideo = get_post( $id );
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h3 class="home-video-title"><?php echo $postVideo->post_title;?></h3>
				<div class="home-video-content">
					<p><?php echo get_post_meta( $id, 'tom_tat', true ); ?></p>
				</div>
				<a class="btn btn-info" href="<?php echo get_permalink($id); ?>">Xem Chi Tiết</a>
			</div>
			<div class="col-sm-6">
				<div class="home-video-right" style="background-image: url('<?php echo THEME_URL; ?>/images/post_video_border.png')">
				</div>
			</div>
		</div>
	</div>
	<?php
}

/* Trang dang ky hoc */

function home_khoahoc_lichhoc() {
	$args_schedule = array(
		'post_type' => 'schedule',
	);

	$args = array(
		'post_type' => 'course',
	);

	$backgroundString = 'background_color';
	?>


	<?php
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
	?>

		<div class="col-sm-12">
			<h3 class="sub-head" style="color: <?php echo  get_post_meta( get_the_ID(), $backgroundString, true )?>"><?php the_title(); ?></h3>
			<br/>
			<table class="table table-striped">
				<tr>
					<th>STT</th>
					<th>Mã khóa</th>
					<th>Thời gian</th>
					<th>Khai giảng</th>
					<th>Học phí</th>
				</tr>

				<?php
					$courseId = get_the_ID();
					$count = 0;
				?>

				<?php $the_query_schedule = new WP_Query( $args_schedule );
					if ( $the_query_schedule->have_posts() ) :
					while ( $the_query_schedule->have_posts() ) :
						$the_query_schedule->the_post();
				?>

				<?php
					$makhoa = get_post_meta( get_the_ID(), 'khoa_hoc', true );
					if ( $makhoa == $courseId ) {

						?>
						<tr>
							<td><?php echo ++$count;?></td>
							<td><?php the_title(); ?></td>
							<td><?php echo get_post_meta( get_the_ID(), 'thoi_gian', true );?></td>
							<td><?php echo get_post_meta( get_the_ID(), 'gio_khai_giang', true );?> <?php echo get_post_meta( get_the_ID(), 'khai_giang', true );?></td>
							<td><?php echo get_post_meta( get_the_ID(), 'hoc_phi', true );?></td>
						</tr>

						<?php

					}
				?>

				<?php
					endwhile;
				endif;
				?>
			</table>
		</div>

	<?php
		endwhile;
	endif;
	?>


	<div class="col-sm-6">
		<div class="form">
			<h3 class="sub-head">Chọn lịch học:</h3>

	<?php
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
	?>

				<?php
					$color = get_post_meta( get_the_ID(), $backgroundString, true );
					$courseId = get_the_ID();
					$count = 0;
				?>

				<?php $the_query_schedule = new WP_Query( $args_schedule );
					if ( $the_query_schedule->have_posts() ) :
					while ( $the_query_schedule->have_posts() ) :
						$the_query_schedule->the_post();
				?>

				<?php
					$makhoa = get_post_meta( get_the_ID(), 'khoa_hoc', true );
					if ( $makhoa == $courseId ) {

						?>
						<h5 class="sub-head"><label><input type="radio" name="khoa_hoc" value="<?php echo get_the_ID();?>"> <span class="test-a" style="color: <?php echo $color; ?>"> <?php the_title(); ?>: <?php echo get_post_meta( get_the_ID(), 'thoi_gian', true );?>. Khai giảng <?php echo get_post_meta( get_the_ID(), 'khai_giang', true );?></span></label></h5>

						<?php

					}
				?>

				<?php
					endwhile;
				endif;
				?>

	<?php
		endwhile;
	endif;
	?>

		</div>
	</div>


	<?php

}

/* Dang ky khoa hoc ajax*/

function register_course_ajax() {
	if ($_POST['name'] == '' || $_POST['phone'] == '' || !isset($_POST['khoa_hoc'])) {
		echo json_encode(array(
			'status' => 0
			));
	} else {
		$postarr = array(
			'post_title' => $_POST['name'],
			'post_type' => 'register',
			'post_status'   => 'publish',
		);
		$postId = wp_insert_post( $postarr, true );
		add_post_meta($postId, 'phone', $_POST['phone']);
		add_post_meta($postId, 'email', $_POST['email']);
		add_post_meta($postId, 'phone_group', $_POST['phone_group']);
		add_post_meta($postId, 'thoi_gian', $_POST['thoi_gian']);
		add_post_meta($postId, 'khoa_hoc', $_POST['khoa_hoc']);
		//$message = "Name: " . $_POST['name'] . " , phone: " . $_POST['phone']) . " , email: " . $_POST['email']);
		$subject = '[ĐĂNG KÝ HỌC] - ' . $_POST['name'];
		$message = 'Bạn có một lượt đăng ký học mới:

		Họ tên: ' . $_POST['name'] . '
		Điện thoại: ' . $_POST['phone'] . '
		Email: ' . $_POST['email'] . '
		Khóa học: ' . get_the_title($_POST['khoa_hoc']) . '
		Học theo nhóm: ' . $_POST['phone_group'] . '
		Thời gian đề xuất: ' . $_POST['thoi_gian'] . '

		Xem danh sách đăng ký ở đây: http://trangloren.com/wp-admin/edit.php?post_type=register';
		wp_mail( 'tranglorencontact@gmail.com,doandinhthang@gmail.com', $subject, $message);
		echo json_encode(array(
			'status' => 1,
			'postValue' => $_POST
			));
	}
	exit;
}

add_action( 'wp_ajax_register_course', 'register_course_ajax' );
add_action( 'wp_ajax_nopriv_register_course', 'register_course_ajax' );

/* Search form*/

function search_form() {
	?>
	<div class="sidebar-widget">
		<form action="/" method="get">
			<div class="sidebar-search">
				<input class="search" name="s" id="search" type="text"  value="<?php echo get_search_query(); ?>" placeholder="Nhập từ khóa tìm kiếm" />
				<input class="search-button" type="submit" value="" />
			</div>
		</form>
	</div>
	<?php
}

/* limit post type when search */

function mySearchFilter($query) {
	// $post_type = $_GET['type'];
	// if (!$post_type) {
	// 	$post_type = 'post';
	// }
    if ($query->is_search) {
        $query->set('post_type', 'post');
    };
    return $query;
};

add_filter('pre_get_posts','mySearchFilter');