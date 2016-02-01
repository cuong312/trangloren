<?php

/**
 * Popliup - Wordpress popup plugin
 *
 * @link              	http://webliup.com/wp-plugins/popliup
 * @since             	1.0.0
 * @package           	Popliup
 * @copyright 2015 		Webliup
 *
 * @wordpress-plugin
 * Plugin Name:      	Popliup - Wordpress Popup Plugin
 * Plugin URI:        	http://webliup.com/wp-plugins/popliup
 * Description:       	Wordpress popup plugin to show welcome messages, exit messages, optin forms, advertises, contact forms and many more. Higly customizable, themeable and stylable to meet your needs.  
 * Version:           	1.0.0
 * Author:           	Webliup
 * Author URI:        	http://webliup.com
 * License:           	GPL-2.0+
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       	popliup
 * Domain Path:       	/languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-popliup-activator.php
 */
function activate_popliup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-popliup-activator.php';
	Popliup_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-popliup-deactivator.php
 */
function deactivate_popliup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-popliup-deactivator.php';
	Popliup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_popliup' );
register_deactivation_hook( __FILE__, 'deactivate_popliup' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-popliup.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_popliup() {

	$plugin_dir     = trailingslashit( dirname( __FILE__ ) );
	$plugin_dir_rel = trailingslashit( dirname( plugin_basename( __FILE__ ) ) );
	$plugin_url     = plugin_dir_url( __FILE__ );

	define( 'POPLI_INC_DIR', $plugin_dir . 'includes/' );
	define( 'POPLI_THEMES_DIR', $plugin_dir . 'themes/' );
	define( 'POPLI_ADMIN_DIR', $plugin_dir . 'admin/' );
	define( 'POPLI_PUBLIC_DIR', $plugin_dir . 'public/' );
	define( 'POPLI_ADMIN_INC', $plugin_dir . 'admin/inc/' );
	define( 'POPLI_ADMIN_INC_URI', $plugin_url . 'admin/inc/' );
	define( 'POPLI_PUBLIC_INC', $plugin_dir . 'public/inc/' );
	define( 'POPLI_ASSETS', $plugin_url . 'assets/' );
	define( 'POPLI_THEMES_URI', $plugin_url . 'themes/' );
	define( 'POPLI_LANG', 'popliup' );

	$plugin = new Popliup();
	$plugin->run();

}
run_popliup();
