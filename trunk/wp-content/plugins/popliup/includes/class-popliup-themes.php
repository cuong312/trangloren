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

class PopliupThemes {	

	/**
	 * All avialable popliup themes.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $all_themes    The list of all available themes.
	 */
	private static $all_themes;


	private static $active_theme;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->active_theme = 'default';

		$this->add_theme_files();
		$this->initiate_active_theme();

	}	

	/**
	 * Search and add all popliup themes
	 *
	 * @since    1.0.0
	 */
	private function add_theme_files() {

		$themes = array();

		foreach(  glob( POPLI_THEMES_DIR.'/*/popliup-theme-*.css') as $file) {
			$theme_slug = str_replace( 'popliup-theme-', '', basename($file,'.css'));
			$theme_name = ucwords(str_replace('-', ' ', $theme_slug ));
			$themes[] = array('slug'=> $theme_slug, 'name'=> $theme_name );
		}

		$this->all_themes = $themes;
	}

}
