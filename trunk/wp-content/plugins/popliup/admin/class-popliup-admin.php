<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://webliup.com/wp-plugins/popliup
 * @since      1.0.0
 *
 * @package    Popliup
 * @subpackage Popliup/admin
 */


class Popliup_Admin {

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

	
	/**
	 * All available conditions.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $popliup_conditions  The list of all display conditions.
	 */
	private $popliup_conditions;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->_init();

	}

	/**
	 * Register popliup post type and add hooks
	 *
	 * @since    1.0.0
	 */
	private function _init(){

		$labels = array(
			'name'                => _x( 'Popliup Popups', 'Post Type General Name', POPLI_LANG ),
			'singular_name'       => _x( 'Popup', 'Post Type Singular Name', POPLI_LANG ),
			'menu_name'           => __( 'Popliup', POPLI_LANG ),
			'parent_item_colon'   => __( 'Parent Item:', POPLI_LANG ),
			'all_items'           => __( 'All Popups', POPLI_LANG ),
			'view_item'           => __( 'View Item', POPLI_LANG ),
			'add_new_item'        => __( 'Add New Popup', POPLI_LANG ),
			'add_new'             => __( 'Add New', POPLI_LANG ),
			'edit_item'           => __( 'Edit Popup', POPLI_LANG ),
			'update_item'         => __( 'Update Popup', POPLI_LANG ),
			'search_items'        => __( 'Search Popup', POPLI_LANG ),
			'not_found'           => __( 'Not found', POPLI_LANG ),
			'not_found_in_trash'  => __( 'No Popups found in the Trash', POPLI_LANG ),
		);

		$args = array(
			'label'               => __( 'Popliup', POPLI_LANG ),
			'description'         => __( 'Wordpress plugin for showing popup messages!', POPLI_LANG ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
			'menu_position'       => 78,
			'menu_icon'           => 'dashicons-feedback',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'rewrite'             => false,
		);		
		
		register_post_type( 'popliup', $args );	

		$this->popliup_conditions = new PopliupRules();	

		//Add small info under the popliup post title

		add_action( 'edit_form_after_title', array( $this, 'popup_title_info' )	);

		//Save the popup data
		add_action( 'save_post_popliup', array( $this, 'save_popup_data' ), 10, 3 );

		//Add Metaboxes
		add_action( 'add_meta_boxes', array( $this, 'popliup_meta_boxes' ) );
		add_action( 'add_meta_boxes', array($this, 'initialize_active_theme') );

		add_action( 'post_submitbox_misc_actions', array($this, 'preview_btn') );
		add_action( 'wp_head', array( $this, 'add_ajax_library')  );
		add_action( 'wp_ajax_preview_popup', array($this, 'preview_popup') );
		add_action( 'wp_ajax_display_theme_options', array($this, 'display_theme_options') );
		

	}


	/**
	 * Add preview button in the save metabox
	 *
	 * @since    1.0.0
	 */
	public function preview_btn() {
	    global $post;

	    if (get_post_type($post) == 'popliup') { ?>
	       <div id="previewBtnHldr">
				<button title="Popup content style can vary in the frontend" type="button" class="preview-btn button" data-popup_id="<?php echo $post->ID;?>" >
				<i class="dashicons dashicons-visibility"></i>
				Preview PopUp				</button>
			</div>
			<?php 
	    }
	}

	/**
	 * Add the admin ajax url for javascript files
	 *
	 * @since    1.0.0
	 */
	public function add_ajax_library() {
 
	    $html = '<script type="text/javascript">';
	        $html .= 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '"';
	    $html .= '</script>';
	 
	    echo $html;
	 
	}

	/**
	 * Search and get the names of all available popup themes
	 *
	 * @since    1.0.0
	 */
	public function get_themes(){		

		$themes = array( array( 'slug'=> 'default', 'name'=> 'Default' ), array( 'slug'=> 'minimal', 'name'=> 'Minimal' ) );
		return $themes;
	}


	/**
	 * Include the current popup theme file
	 *
	 * @since  1.0
	 * @param  string 		$theme_slug 	Slug of the theme to be included
	 */
	public function initialize_active_theme( $theme_slug='' ){

		global $post;
		$display_options = get_post_meta( $post->ID, 'popli_display_options', true );

		if( !isset( $display_options['popup_theme'] ) ) {
			$theme_slug =  'default';
		}else{
			$theme_slug = $display_options['popup_theme'];
		}

		

		$theme_file = POPLI_THEMES_DIR.$theme_slug.'/'.$theme_slug.'.php';
		if( is_file( $theme_file ) )
			include_once $theme_file;

	}

	/**
	 * Display the theme options upon selecting the theme
	 *
	 * @since  1.0
	 * @param  string 		$theme_slug 	Slug of the theme which options are to be displayed
	 */
	public function display_theme_options( $theme_slug='' ){
		
	    if( isset( $_POST['theme_name'] ) ) {
	        $theme_slug = $_POST['theme_name'];
	    }
			$theme_file = POPLI_THEMES_DIR.$theme_slug.'/'.$theme_slug.'.php';
		if( is_file( $theme_file ) )
			include_once $theme_file;

		$display_options = get_post_meta( $_POST['popup'], 'popli_display_options', true );
		 do_action( 'popliup_theme_options', $display_options );
		 die();
	}


	/**
	 * Ajax function to be called for previewing the popup
	 *
	 * @since    1.0.0
	 */
	public function preview_popup() {
		parse_str($_POST['form_data'], $_POST);
		
	    if( isset( $_POST['post_ID'] ) ) {
	        $popup_id = $_POST['post_ID'];
	        
			$popup_options = array( 'display_options'=> $_POST['display_options'], 'content'=> $_POST['content']);
		
	        $this->show_popup($popup_id, $popup_options );
	         die();
	 	
	    } // end if	
	 
	}

	/**
	 * Show the popup for preview
	 *
	 * @since  1.0
	 * @param  int 		$popup_id 	ID of the popup
	 * @param  array 	$popup_options Array containing popup display options and conditions
	 */
	private function show_popup( $popup_id, $popup_options ) {					
	
		$popup_class = '';
		$show_popup = true;	

		$display_options = $popup_options['display_options'];

		if( !isset( $display_options['popup_theme'] ) ) {
			$theme_slug =  'default';
		}else{
			$theme_slug = $display_options['popup_theme'];
		}		

		$theme_file = POPLI_THEMES_DIR.$theme_slug.'/'.$theme_slug.'.php';
		if( is_file( $theme_file ) )
			include_once $theme_file;		

				if( $show_popup ){

					$appear_after_type = '';
					$popup_data = ' data-popup_id="'.$popup_id.'" ';					


					$display_options = $popup_options['display_options'];

					$popup_noshow_enabled = (isset($display_options['enable_popup_noshow']) && $display_options['enable_popup_noshow'] == 1)?true:false;
					
					if( isset( $display_options['open_animation'] ) && ($display_options['open_animation'] !== 0 ) ) {
						$open_animation = $display_options['open_animation'];
						$popup_data.= ' data-open_animation="'.$open_animation.'" ';
					}

					if( isset( $display_options['close_animation'] ) && ($display_options['close_animation'] !== 0 ) ) {
						$close_animation = $display_options['close_animation'];
						$popup_data.= ' data-close_animation="'.$close_animation.'" ';
					}

					if( isset( $display_options['appear_after_type'] ) &&  $display_options['appear_after_type'] != '' ){

						$appear_after_type = 'time'; 						
					}

					$popup_class = 'dnone';

					if( 'time' == $appear_after_type){

						$appear_after_time   = 0;
						$popup_data.= ' data-appear_after_time="'.$appear_after_time.'" ';						

					}

					if( isset($display_options['popup_position']) ){						
						
						$popup_class.=' '.$display_options['popup_position'].' ';

					}

					if( isset($display_options['popup_theme']) ){						
						
						$popup_class.=' theme-'.$display_options['popup_theme'].' ';

					}

					$popup_content = apply_filters( 'the_content', $popup_options['content'] );

					$this->popup_html ='

					<div id="popliup-'.$popup_id.'" class="popliup-box '.$popup_class.'" '.$popup_data.' >						
							<div class="popliup-close" data-popup_id="'.$popup_id.'">x</div>
							<div class="popliup-content">
								'.$popup_content
								;
					if( isset( $display_options['add_no_show_link']) ){
						$this->popup_html.='<div class="no-show-link"><a id="noShowLink" data-popup_id="'.$popup_id.'" href="#">Do not show this message again</a></div> ';
					}

							$this->popup_html.= '</div> <!-- content end-->
					</div> <!-- box end-->
					<div id="popliupOverlay-'.$popup_id.'" class="popliup-overlay dnone"></div>';

					$this->popup_html  = apply_filters( 'popup_preview_after_box', $this->popup_html );

					/************************/
					/***** POPUP STYLES *****/					
					/************************/

					$this->popup_css = '<style type="text/css"> #popliup-'.$popup_id.' { ';

					/* ====== Popup Box Styles =====*/

					$this->popup_css.= isset( $display_options['popup_width']) ? ' width: '.$display_options['popup_width'].'; ' : '';				
					$this->popup_css.= isset( $display_options['enable_rounded_corners']) ? 'border-radius: 5px; ' : 'border-radius: 0px;';

					/* ====== Popup Content Styles =====*/
					$this->popup_css.= '} #popliup-'.$popup_id.' .popliup-content{';

					$this->popup_css.= isset( $display_options['popup_bg_color']) ? ' background-color: '.$display_options['popup_bg_color'].'; ' : '';
					$this->popup_css.= isset( $display_options['enable_rounded_corners']) ? 'border-radius: 5px; ' : 'border-radius: 0px;';
					
					/* ====== Popup Overlay Styles =====*/
					$this->popup_css.= '} #popliupOverlay-'.$popup_id.' {';

					$this->popup_css.= isset( $display_options['overlay_color']) ? ' background-color: '.$display_options['overlay_color'].'; ' : '';
					$this->popup_css.= isset( $display_options['overlay_opacity']) ? ' opacity: '.$display_options['overlay_opacity'].'; ' : '';
					
					$this->popup_css.= '}</style>';

					if( isset( $display_options['popup_theme'] ) && $display_options['popup_theme'] != "0" ){ //var_dump($display_options['popup_theme']);
						 

						$theme_css = $this->get_theme_stylesheet_uri( $display_options['popup_theme'] );
						$this->popup_css.= "<link rel='stylesheet' href='". $theme_css ."' type='text/css' media='all' />";
						$this->popup_css = apply_filters( 'popup_theme_css', $popup_id, $this->popup_css, $display_options );
						
					}



				} 

			echo '<div id="previewHldr">';
			echo $this->popup_html;
			echo $this->popup_css;
			echo '</div>';

	}

	public function get_theme_stylesheet_uri( $theme_slug  ) {
		
		return POPLI_THEMES_URI.$theme_slug.'/popliup-theme-'.$theme_slug.'.css';

	}

	/**
	 * Add popliup metaboxes
	 *
	 * @since    1.0.0
	 */
	public function popliup_meta_boxes() {


		add_meta_box(
			'popliupDisplayConditions',
			__( 'Display Conditions', POPLI_LANG ),
			array( $this, 'popup_conditions_metabox' ),
			'popliup',
			'normal',
			'high'
		);


		add_meta_box(
			'popliupDisplayOptions',
			__( 'Display Options', POPLI_LANG ),
			array( $this, 'popup_options_metabox' ),
			'popliup',
			'normal',
			'high'
		);

		add_meta_box(
			'contactSupport',
			__( 'Free Support', POPLI_LANG ),
			array( $this, 'popup_contact_support_metabox' ),
			'popliup',
			'side',
			'default'
		);

		add_meta_box(
			'subscribeUpdates',
			__( 'Subscribe Now', POPLI_LANG ),
			array( $this, 'popup_subscribe_metabox' ),
			'popliup',
			'side',
			'default'
		);

	}

	/**
	 * Add a little info regarding the popup title
	 *
	 * @since    1.0.0
	 */
	public function popup_title_info() {

		if(get_post_type() == 'popliup'){
		?>
			<em><strong> <?php _e("Please Note: ", POPLI_LANG);?> </strong> <?php  _e("Popup Title doesn't appear on the popup. It is just for naming purpose. Only the content of the editor will appear on the popup.", POPLI_LANG);?> </em>
		
		<?php 
		}

	}

	/**
	 * Include the display conditions/rules metabox file
	 *
	 * @since  1.0
	 * @param  WP_Post 	$post 	Post object containing popup data
	 */
	public function popup_conditions_metabox( $post ) {

		include POPLI_ADMIN_INC.'popliup_conditions_metabox.php';

	}

	/**
	 * Include the display options metabox file
	 *
	 * @since  1.0
	 * @param  WP_Post 	$post 	Post object containing popup data
	 */
	public function popup_options_metabox( $post ) {

		include POPLI_ADMIN_INC.'popliup_options_metabox.php';

	}

	/**
	 * Include the contact support metabox file
	 *
	 * @since  1.0
	 * @param  WP_Post 	$post 	Post object containing popup data
	 */
	public function popup_contact_support_metabox( $post ) {

		include POPLI_ADMIN_INC.'popliup_contact_support_metabox.php';

	}

	/**
	 * Include the subscription form metabox file
	 *
	 * @since  1.0
	 * @param  WP_Post 	$post 	Post object containing popup data
	 */
	public function popup_subscribe_metabox( $post ) {

		include POPLI_ADMIN_INC.'popliup_subscribe_metabox.php';

	}	


	/**
	 * Saves the popup data to the database
	 *
	 * @since  1.0
	 * @param  int 		$post_id 	The generated post ID for the popup
	 */
	public function save_popup_data( $post_id ) {		



		$data = $this->build_data( $_POST );

		switch ( $data['status'] ) {
			case 'active':   $status = 'publish'; break;
			case 'inactive': $status = 'draft'; break;
			case 'trash':    $status = 'trash'; break;
			default:         $status = 'draft'; break;
		}

		update_post_meta( $post_id, 'popli_display_options', $data['display_options']);
		update_post_meta( $post_id, 'popli_conditions', $data['conditions']);
		update_post_meta( $post_id, 'popli_conditions_data',  $data['conditions_data'] );

	}


	/**
	 * Build the popup data to be saved from the $_POST variable
	 *
	 * @since  1.0
	 * @param  array 	$post_data 	The submitted popup values
	 */
	private function build_data($post_data){

		if( empty( $post_data ) ) return;

		//Saves previous theme options instead of overwriting them while saving
		$new_theme_opts = $post_data['display_options']['theme_opts'][$post_data['display_options']['popup_theme']];
		$display_options = get_post_meta( $post_data['post_ID'], 'popli_display_options', true );
		if( isset( $display_options['theme_opts'] ) )
			$post_data['display_options']['theme_opts'] = $display_options['theme_opts'];
		$post_data['display_options']['theme_opts'][$post_data['display_options']['popup_theme']] = $new_theme_opts;	
		$popup_conditions = isset( $post_data['popup_conditions'] )? $post_data['popup_conditions'] :array();

		$data = array(
			// Meta: Content
			'name' => $post_data['post_title'],
			'content' => stripslashes( $post_data['post_content'] ),

			//Meta: Display Options
			'display_options' => $post_data['display_options'],

			// Meta: Conditions
			'conditions' => $popup_conditions,
			'conditions_data' => $this->build_conditions_data($post_data),
		);

		if ( ! is_array( $data['conditions'] ) ) { $data['conditions'] = array(); }
		if ( ! isset( $data['status'] ) ) { $data['status'] = 'active'; }

		return $data;

	}

	/**
	 * Build the display conditions data from the $_POST variable
	 *
	 * @since  1.0
	 * @param  array 	$post_data 	The submitted popup values
	 */
	private function build_conditions_data( $post_data ){

		$all_conditions = $this->popliup_conditions->get_display_rules();

		$conditions_data = array();

		if( ! empty( $post_data['popup_conditions'] ) ){

			foreach($post_data['popup_conditions'] as $condition_name){

				$data_prepare_func = $condition_name.'_prepare_data';

				if( method_exists( $all_conditions[$condition_name]->obj, $data_prepare_func ) ){
					if( isset( $post_data['popup_conditions_data'][$condition_name] )){
						$conditions_data[$condition_name] = $all_conditions[$condition_name]->obj->$data_prepare_func( $post_data['popup_conditions_data'][$condition_name] );
					}
				}				
				
			}

			// Preserve condition values while they get deactivated
			foreach( array_diff( array_keys( $all_conditions ), $post_data['popup_conditions'] ) as $inactive_condition ){
				if( isset( $post_data['popup_conditions_data'][$condition_name] )){
					$conditions_data[$inactive_condition] = $all_conditions[$condition_name]->obj->$data_prepare_func( $post_data['popup_conditions_data'][$condition_name] );
				}
			}

		}
		
		return $conditions_data;
	}

	/**
	 * Checks if a given display condition is active for the popup
	 *
	 * @since  1.0
	 * @param  int 		$popup_id 	ID of the popup
	 * @param  string 	$condition 	Name of the display condition
	 */
	public function is_condition_active( $popup_id, $condition ){

		$conditions = get_post_meta( $popup_id, 'popli_conditions', true );
		return (in_array($condition, $conditions)) ? true : false;

	}

	/**
	 * Get display conditions that are active/on for the popup
	 *
	 * @since  1.0
	 * @param  int 		$popup_id 	ID of the popup
	 */
	public function get_active_conditions( $popup_id ){

		$active_conditions = get_post_meta( $popup_id, 'popli_conditions', true );
		return ( !empty( $active_conditions ) )? $active_conditions : array();

	}

	/**
	 * Retirve the display conditions data
	 *
	 * @since  1.0
	 * @param  int 		$post_id 	ID of the popup
	 */
	public function get_conditions_data( $popup_id ){

		return get_post_meta( $popup_id, 'popli_conditions_data', true );

	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {		

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'popliup-popup-basic', POPLI_ASSETS . 'css/popliup-popup-basic.css', array(), $this->version, 'all');
		wp_enqueue_style( 'bootstrap-toggle-style', POPLI_ASSETS . 'css/bootstrap2-toggle.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {	

		wp_enqueue_script( 'popliup-wp-admin', POPLI_ASSETS . 'js/popliup-wp-admin.min.js', array( 'jquery', 'wp-color-picker' ), '1.0', 	true );
		wp_enqueue_script( 'bootstrap-toggle-script', POPLI_ASSETS . 'js/bootstrap2-toggle.js', array( 'jquery' ), '1.0', 	true );

	}

}