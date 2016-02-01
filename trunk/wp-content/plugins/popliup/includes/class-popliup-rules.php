<?php


/**
 * Popliup rules for displaying popups
 *
 * @link       http://webliup.com/wp-plugins/popliup
 * @since      1.0.0
 *
 * @package    Popliup
 * @subpackage Popliup/admin
 */

class PopliupRules {

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
	 * Name of all display rules
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $all_rules    Array containing the name of all rules
	 */
	private static $all_rules;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct() {

		$this->add_rule_files();
	}

	/**
	 * Search and add all rule files
	 *
	 * @since    1.0.0
	 */
	private function add_rule_files() {
		
		foreach( glob( POPLI_INC_DIR.'/*-rules/*.php') as $file) {
			require_once $file;

			$class_name = 'PopliupRule_'.ucwords(  str_replace( 'class-popliup-rule-', '',  basename( $file, ".php" ) ) );
		   	$the_rule = new $class_name();
		}	

	}


	/**
	 * Registers a rule to be available in the admin
	 *
	 * @since    1.0.0
	 * @param    string    $rule_name   Name of the rule.
	 * @param    string    $rule_obj    The rule object instance containing all require methods
	 * @param    string    $rule_title  Dsiplay name of the rule
	 * @param    string    $rule_desp   A short description of the rule
	 * @param    string    $opp_rules   Opposite rules that should turned off when the current rule is active
	 */
	public static function register_rule( $rule_name, $rule_obj, $rule_title, $rule_desp, $opp_rules ){ 

		PopliupRules::$all_rules[ $rule_name ] = (object) array(
			'name' => $rule_name,
			'obj' => $rule_obj,
			'title' => $rule_title,
			'description' => $rule_desp,
			'opp_rules' => $opp_rules,
		);



	}

	/**
	 * Get the name of all available rules
	 *
	 * @since    1.0.0
	 */
	public function get_display_rules() {		

		return PopliupRules::$all_rules;

	}
	

}
