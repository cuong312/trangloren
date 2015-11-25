<?php

if ( ! class_exists( 'Loren_Theme_Options' ) ) {
	class Loren_Theme_Options {

		public $args = array();
		public $sections = array();
		public $theme;
		public $ReduxFramework;

		public function __construct() {

			if ( ! class_exists( 'ReduxFramework' ) ) {
				return;
			}

			if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
				$this->initSettings();
			} else {
				add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
			}
		}

		public function initSettings() {
			$this->setArguments();

			$this->setHelpTabs();

			$this->setSections();

			if ( ! isset( $this->args['opt_name'] ) ) {
				return;
			}

			$this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
		}

		public function setArguments() {
			$theme = wp_get_theme();
			$this->args = array(
				'opt_name'		=> 'loren_options',
				'display_name'	=> $theme->get( 'Name' ),
				'menu_type'		=> 'menu',
				'allow_sub_menu'=> true,
				'menu_title'	=> 'Theme Options',
				'page_title'	=> 'Theme Options',
				'dev_mode'		=> false,
				'customizer'	=> true,
				'menu_icon'		=> '',
				'hints'              => array(
		            'icon'          => 'icon-question-sign',
		            'icon_position' => 'right',
		            'icon_color'    => 'lightgray',
		            'icon_size'     => 'normal',
		            'tip_style'     => array(
		                'color'   => 'light',
		                'shadow'  => true,
		                'rounded' => false,
		                'style'   => '',
		            ),
		            'tip_position'  => array(
		                'my' => 'top left',
		                'at' => 'bottom right',
		            ),
		            'tip_effect'    => array(
		                'show' => array(
		                    'effect'   => 'slide',
		                    'duration' => '500',
		                    'event'    => 'mouseover',
		                ),
		                'hide' => array(
		                    'effect'   => 'slide',
		                    'duration' => '500',
		                    'event'    => 'click mouseleave',
		                ),
		            ),
		        )
			);
		}

		public function setHelpTabs() {
 
		    // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
		    $this->args['help_tabs'][] = array(
		        'id'      => 'redux-help-tab-1',
		        'title'   => __( 'Theme Information 1', 'thachpham' ),
		        'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'thachpham' )
		    );
		 
		    $this->args['help_tabs'][] = array(
		        'id'      => 'redux-help-tab-2',
		        'title'   => __( 'Theme Information 2', 'thachpham' ),
		        'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'thachpham' )
		    );
		 
		    // Set the help sidebar
		    $this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'thachpham' );
		}

		public function setSections() {
 
		    // Home Section
		    $this->sections[] = array(
		        'title'  => 'Trang chủ', 'thachpham',
		        'desc'   => 'Tùy chỉnh hiển thị cho trang chủ',
		        'icon'   => 'el-icon-home',
		        'fields' => array(
		        	// Mỗi array là một field
		        	array(
		        		'id'		=> 'logo-on',
		        		'type'		=> 'switch',
		        		'title'		=> 'Kích hoạt ảnh logo',
		        		'compiler'	=> 'bool',
		        		'desc'		=> 'Bạn có muốn hiển thị logo ảnh.',
		        		'on'		=> 'Kích hoạt',
		        		'off'		=> 'Vô hiệu hóa'
		        	),

		        	array(
		        		'id'		=> 'logo-image',
		        		'type'		=> 'media',
		        		'title'		=> 'Ảnh Logo',
		        		'desc'		=> 'Chọn ảnh mà bạn muốn làm logo.',
		        	),

		        	array(
		        		'id'		=> 'home-about-1',
		        		'type'		=> 'text',
		        		'title'		=> 'Giới thiệu 1',
		        		'desc'		=> 'Nhập câu giới thiệu trên trang chủ.'
		        	),

		        	array(
		        		'id'		=> 'home-about-1-link',
		        		'type'		=> 'text',
		        		'title'		=> 'Link giới thiệu 1',
		        		'desc'		=> 'Chèn link cho icon giới thiệu 1.'
		        	),

		        	array(
		        		'id'		=> 'home-about-2',
		        		'type'		=> 'text',
		        		'title'		=> 'Giới thiệu 2',
		        		'desc'		=> 'Nhập câu giới thiệu trên trang chủ.'
		        	),

		        	array(
		        		'id'		=> 'home-about-2-link',
		        		'type'		=> 'text',
		        		'title'		=> 'Link giới thiệu 2',
		        		'desc'		=> 'Chèn link cho icon giới thiệu 2.'
		        	),

		        	array(
		        		'id'		=> 'home-about-3',
		        		'type'		=> 'text',
		        		'title'		=> 'Giới thiệu 3',
		        		'desc'		=> 'Nhập câu giới thiệu trên trang chủ.'
		        	),

		        	array(
		        		'id'		=> 'home-about-3-link',
		        		'type'		=> 'text',
		        		'title'		=> 'Link giới thiệu 3',
		        		'desc'		=> 'Chèn link cho icon giới thiệu 3.'
		        	),

		        	array(
		        		'id'		=> 'home-slogan-title',
		        		'type'		=> 'text',
		        		'title'		=> 'Tiêu đề Slogan',
		        		'desc'		=> 'Nhập tiêu đề slogan.'
		        	),

		        	array(
		        		'id'		=> 'home-slogan',
		        		'type'		=> 'textarea',
		        		'title'		=> 'Câu slogan',
		        		'desc'		=> 'Nhập câu slogan.'
		        	),

		        	array(
		        		'id'		=> 'home-post',
		        		'type'		=> 'text',
		        		'title'		=> 'ID bài viết giới thiệu trên trang chủ',
		        		'desc'		=> 'Nhập ID bài viết giới thiệu.'
		        	),

		        	array(
		        		'id'		=> 'home-post-video',
		        		'type'		=> 'text',
		        		'title'		=> 'Địa chỉ URL Youtube video giới thiệu',
		        		'desc'		=> 'Nhập địa chỉ video Youtube.'
		        	),

		        	array(
		        		'id'		=> 'home-address',
		        		'type'		=> 'text',
		        		'title'		=> 'Địa chỉ',
		        		'desc'		=> 'Nhập địa chỉ.'
		        	),

		        	array(
		        		'id'		=> 'home-phone',
		        		'type'		=> 'text',
		        		'title'		=> 'Số điện thoại',
		        		'desc'		=> 'Nhập số điện thoại.'
		        	),

		        	array(
		        		'id'		=> 'home-email',
		        		'type'		=> 'text',
		        		'title'		=> 'Email',
		        		'desc'		=> 'Nhập số địa chỉ email.'
		        	),

		        	array(
		        		'id'		=> 'home-facebook',
		        		'type'		=> 'text',
		        		'title'		=> 'Địa chỉ facebook',
		        		'desc'		=> 'Nhập link facebook.'
		        	),


		        ),
		    ); // end section
		 
		}

	}

	global $reduxConfig;
	$reduxConfig = new Loren_Theme_Options();
}