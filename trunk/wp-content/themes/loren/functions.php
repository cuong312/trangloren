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
	//wp_enqueue_style( 'layer-slider', get_template_directory_uri() . '/layerslider/css/layerslider.css' );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.1.9.1.js');
	wp_enqueue_script( 'testimonials', get_template_directory_uri() . '/js/testimonials.js');
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/script.js');
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.js');
	//wp_enqueue_script( 'html5lightbox-script', get_template_directory_uri() . '/js/html5lightbox.js');
	wp_enqueue_script( 'carouFredSel-script', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js');
	wp_enqueue_script( 'styleswitcher-script', get_template_directory_uri() . '/js/styleswitcher.js');
	//wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/layerslider/JQuery/jquery-easing-1.3.js');
	//wp_enqueue_script( 'jquery-transit', get_template_directory_uri() . '/layerslider/JQuery/jquery-transit-modified.js');
	//wp_enqueue_script( 'layerslider-transitions', get_template_directory_uri() . '/layerslider/js/layerslider.transitions.js');
	//wp_enqueue_script( 'layerslider-kreaturamedia', get_template_directory_uri() . '/layerslider/js/layerslider.kreaturamedia.jquery.js');

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

		// /* Tao side bar */
		// $sidebar = array(
		// 	'name' => __('Main Sidebar', 'cuongbui'),
		// 	'id' => 'main-sidebar',
		// 	'description' => __('Default sidebar'),
		// 	'class' => 'main-sidebar',
		// 	'before_title' => '<h3 class="widgettitle">',
		// 	'after_title' => '</h3>'
		// 	);
		// register_sidebar( $sidebar );



	}
	add_action( 'init', 'cuongbui_theme_setup');
}

/* Thiet lap menu */

if (! function_exists( 'cuongbui_menu' ) ) {
	function cuongbui_menu ($menu) {
		$menu = array(
			'theme_location' => $menu,
			'container' => 'nav',
			'container_class' => 'menu',
			'items_wrap' => '<ul id="menu-navigation">%3$s</ul>'
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
				<p><?php echo $dienthoai; ?></p>
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
		$home_about_2 = isset( $loren_options['home-about-2'] ) ? $loren_options['home-about-1'] : $home_about_default;
		$home_about_3 = isset( $loren_options['home-about-3'] ) ? $loren_options['home-about-1'] : $home_about_default;
		?>
		<section class="home-about">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 text-center">
						<a class="about-icon" href="">
							<i class="fa fa-university"></i>
						</a>
						<div class="about-content">
							<p>
								<?php echo $home_about_1; ?> 
							</p>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<a class="about-icon" href="">
							<i class="fa fa-users"></i>
						</a>
						<div class="about-content">
							<p>
								<?php echo $home_about_2; ?> 
							</p>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<a class="about-icon" href="">
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
	);

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

					<div class="col-md-3 cources-box">
						<div class="staff-member cources-member">
							<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>" alt="" />

							<div class="member-intro" style="background-color: <?php echo get_post_meta( get_the_ID(), $backgroundString, true );?>;">
								<h3><?php the_title(); ?></h3>
								<span>Level 1</span>
							</div>
							<div class="social-contacts">
								<ul>
									<li class="view-couses"><a href="#" title=""><i class="fa fa-eye"></i></a></li>
									<li class="view-register"><a href="#" title=""><i class="fa fa-pencil-square-o"></i></a></li>
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
						<div class="member-intro teacher-info">
							<h3><?php the_title(); ?></h3>
							<span><?php echo get_post_meta( get_the_ID(), 'cong_viec', true );?></span>
						</div>
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
				<div class="col-md-3">
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