<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://webliup.com/wp-plugins/popliup
 * @since      1.0.0
 *
 * @package    Popliup
 * @subpackage Popliup/public
 */


class Popliup_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	private $popliup_conditions;

	private $popup_instances;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action('wp', array( $this, 'display_popups') );
		$this->popliup_conditions = new PopliupRules();

	}
	

	/**
	 * Checks if a condition is active for the popup
	 *
	 * @since    1.0.0
	 * @param    int    	$popup_id   ID of the popup
	 * @param    string   	$condition  The condition to check for
	 */
	public function is_condition_active( $popup_id, $condition ){

		$conditions = get_post_meta( $popup_id, 'popli_conditions', true );
		return (in_array($condition, $conditions)) ? true : false;

	}

	/**
	 * Retirives the active conditions for the popup from the database
	 *
	 * @since    1.0.0
	 * @param    int    $popup_id       ID of the popup
	 */
	public function get_active_conditions( $popup_id ){

		return get_post_meta( $popup_id, 'popli_conditions', true );

	}

	/**
	 * Retrives the display conditions data from database
	 *
	 * @since    1.0.0
	 * @param    int    $popup_id       ID of the popup
	 */
	public function get_conditions_data( $popup_id ){

		return get_post_meta( $popup_id, 'popli_conditions_data', true );

	}

	/**
	 * Includes the active theme file
	 *
	 * @since    1.0.0
	 * @param    string    $theme_slug   Slug of the active theme
	 */
	public function initialize_active_theme( $theme_slug ){

		if( $theme_slug == '' ) {
			$theme_slug =  'default';
		}		

		$theme_file = POPLI_THEMES_DIR.$theme_slug.'/'.$theme_slug.'.php';
		if( is_file( $theme_file ) )
			include_once $theme_file;

	}
	

	/**
	 * Build and output the popups
	 *
	 * @since    1.0.0
	 */
	public function display_popups(){

		//Check conditions to whether show the popup
		if(is_admin())
			return false;

		$args = array(
		    'post_type' => 'popliup',
		    'order'     => 'ASC'
		    );        

		$popups = get_posts( $args ); 

		if( ! empty( $popups ) ){
			
			foreach ( $popups as $popup ) : 

				setup_postdata( $popup );				

				$popup_class = '';
				$popup_id = $popup->ID;
				$show_popup = $this->check_popup_conditions( $popup->ID );				

				if( $show_popup ){

					$popup_instance = new PopliupPopup( $popup->ID );

					$appear_after_type = '';					
					$popup_data = ' data-popup_id="'.$popup->ID.'" ';					


					$display_options = get_post_meta( $popup_id, 'popli_display_options', true );

					$this->initialize_active_theme( $display_options['popup_theme'] );

					$popup_noshow_enabled = (isset($display_options['enable_popup_noshow']) && $display_options['enable_popup_noshow'] == 1)?true:false;
					
								
					if( !(isset( $display_options['test_mode'] ) ) ) { 
						if( isset( $_COOKIE['popli_ns_'.$popup->ID] ) && $_COOKIE['popli_ns_'.$popup->ID] == 'true'){
							continue;
						}
					}
					
					
					

					if( isset( $display_options['appear_after_type'] ) &&  $display_options['appear_after_type'] != '' ){
						
						$appear_after_type = $display_options['appear_after_type'];
						$popup_class = 'dnone';
					}

					if( 'about_to_leave' == $appear_after_type){

						$appear_after_time   = $display_options['after_time']*1000;
						$popup_data.= ' data-appear_about_to_leave="true" ';						

					}

					if( 'time' == $appear_after_type){

						$appear_after_time   = $display_options['after_time']*1000;
						$popup_data.= ' data-appear_after_time="'.$appear_after_time.'" ';						

					}
					
					if( 'scroll' == $appear_after_type){
						
						$appear_after_scroll      = $display_options['after_scroll'];
						$appear_after_scroll_unit = $display_options['scroll_unit'];
						
						$popup_data.= ' data-appear_after_scroll=\'{"unit":"'.$appear_after_scroll_unit.'","value":'.$appear_after_scroll.' }\' ';

					}

					if( isset( $display_options['hide_on_scrollup'] ) ){

						$popup_data.= ' data-scrollup_hide="true" ';						

					}

					$expiry_date = date('d M Y 00:00:00',strtotime('+'.$display_options['expire_after_days'].' days') );
					$popup_data.= ' data-expiry_date="'.$expiry_date.'" ';						

					if( isset( $display_options['close_btn_no_show'] ) && $display_options['close_btn_no_show'] ){

						$popup_data.= ' data-cls_btn_no_show="true" ';						

					}					


					if( isset($display_options['popup_position']) ){						
						
						$popup_class.=' '.$display_options['popup_position'].' ';

					}

					if( isset($display_options['popup_theme']) ){						
						
						$popup_class.=' theme-'.$display_options['popup_theme'].' ';

					}

					$popup_content = apply_filters( 'the_content',get_the_content() );

					$popup_info = array( 'popup_id' => $popup_id, 'popup_content' => $popup_content, 'popup_class' => $popup_class, 'popup_data' => $popup_data  );

					$popup_instance->popup_html ='

					<div id="popliup-'.$popup->ID.'" class="popliup-box '.$popup_class.'" '.$popup_data.' >
						<!-- <div class="popliup-wrapper"> -->
							<div class="popliup-close" data-popup_id="'.$popup->ID.'">x</div>
							<div class="popliup-content">
								'.$popup_content
								;				

							$popup_instance->popup_html.= '</div> <!-- content end-->
					</div> <!-- box end-->
					<div id="popliupOverlay-'.$popup_id.'" class="popliup-overlay dnone"></div>';

					$popup_instance->popup_html = apply_filters( 'popup_box_html', $popup_instance->popup_html, $popup_info, $display_options );

					/************************/
					/***** POPUP STYLES *****/					
					/************************/

					$popup_instance->popup_css = '<style type="text/css"> #popliup-'.$popup_id.' { ';

					/* ====== Popup Box Styles =====*/

					$popup_instance->popup_css.= isset( $display_options['popup_width']) ? ' width: '.$display_options['popup_width'].'; ' : '';					
					$popup_instance->popup_css.= isset( $display_options['enable_rounded_corners']) ? 'border-radius: 5px; ' : 'border-radius: 0px;';

					/* ====== Popup Content Styles =====*/
					$popup_instance->popup_css.= '} #popliup-'.$popup_id.' .popliup-content{';

					$popup_instance->popup_css.= isset( $display_options['popup_bg_color']) ? ' background-color: '.$display_options['popup_bg_color'].'; ' : '';
					$popup_instance->popup_css.= isset( $display_options['enable_rounded_corners']) ? 'border-radius: 5px; ' : 'border-radius: 0px;';
					
					/* ====== Popup Overlay Styles =====*/
					$popup_instance->popup_css.= '} #popliupOverlay-'.$popup_id.' {';

					$popup_instance->popup_css.= isset( $display_options['overlay_color']) ? ' background-color: '.$display_options['overlay_color'].'; ' : '';
					$popup_instance->popup_css.= isset( $display_options['overlay_opacity']) ? ' opacity: '.$display_options['overlay_opacity'].'; ' : '';

					$popup_instance->popup_css.= '}</style>';

					if( isset( $display_options['popup_theme'] ) && $display_options['popup_theme'] != "0" ){ 						 

						$theme_css = $this->get_theme_stylesheet_uri( $display_options['popup_theme'] );
						$popup_instance->popup_css.= "<link rel='stylesheet' href='". $theme_css ."' type='text/css' media='all' />";						
						$popup_instance->popup_css = apply_filters( 'popup_theme_css', $popup_id, $popup_instance->popup_css, $display_options );
						
					}


				} //end if( $show_popup	)

				$this->popup_instances[] = $popup_instance;

			endforeach; 
			wp_reset_postdata();	

			add_action(
			'wp_footer',
				array( $this, 'show_footer')
			);

		} //end if


	}

	/**
	 * Outputs popliup HTML in the page footer
	 *
	 * @since    1.0.0
	 */
	public function show_footer() {
		foreach( $this->popup_instances as $popup_instance ){
			echo $popup_instance->popup_html;
			echo $popup_instance->popup_css;
		}
		
	}

	/**
	 * Get the theme stylesheet url
	 *
	 * @since    1.0.0
	 * @param    string    $theme_slug       Slug of the popup theme
	 */
	public function get_theme_stylesheet_uri( $theme_slug  ) {

		return POPLI_THEMES_URI.$theme_slug.'/popliup-theme-'.$theme_slug.'.css';

	}


	/**
	 * Checks the popup conditions to decide whether the popup should be shown
	 *
	 * @since    1.0.0
	 * @param    int    $popup_id   ID of the popup
	 */
	private function check_popup_conditions( $popup_id ) {

		$show_popup = true;
		$check_results = array();

		$all_conditions = $this->popliup_conditions->get_display_rules();
		$popup_conditions 	   = $this->get_active_conditions( $popup_id );
		$popup_conditions_data = $this->get_conditions_data( $popup_id );

		foreach ( $popup_conditions as $condition_name ) {

			$display_check_func = $condition_name.'_check_display';

				if( method_exists( $all_conditions[$condition_name]->obj, $display_check_func ) ){
					$condition_data = isset( $popup_conditions_data[$condition_name] )? $popup_conditions_data[$condition_name] : '';					
					$check_results[$condition_name] = $all_conditions[$condition_name]->obj->$display_check_func( $condition_data );					
				}


		}

		return !in_array(false, $check_results, TRUE );

	}



	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		
		wp_enqueue_style( 'popliup-popup-basic', POPLI_ASSETS . 'css/popliup-popup-basic.css', array(), $this->version, 'all');


	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {		

		wp_enqueue_script( 'popliup', POPLI_ASSETS . 'js/popliup.min.js', array( 'jquery' ), '1.0', true );

	}

}
