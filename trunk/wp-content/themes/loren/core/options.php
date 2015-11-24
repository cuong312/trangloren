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
		        'title'  => __( 'Header', 'thachpham' ),
		        'desc'   => __( 'All of settings for header on this theme.', 'thachpham' ),
		        'icon'   => 'el-icon-home',
		        'fields' => array()
		    ); // end section
		 
		}

	}

	global $reduxConfig;
	$reduxConfig = new Loren_Theme_Options();
}