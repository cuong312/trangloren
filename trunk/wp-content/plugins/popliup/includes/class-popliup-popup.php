<?php

/**
 * The single instance of a popup
 *
 *
 * @link       http://webliup.com/wp-plugins/popliup
 * @since      1.0.0
 *
 * @package    Popliup
 * @subpackage Popliup/includes
 */


class PopliupPopup {

	/**
	 * The popup id
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $popup_id    The ID of the popup
	 */
	public $popup_id;

	/**
	 * HTML code of the popup instance
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $html   Contains the HTML code of the popup box.
	 */
	public $html;

	/**
	 * CSS code and stylesheets for the popup instance
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $css    Contains the CSS code for the popup box.
	 */	 
	public $css;

	
	public function __construct( $popup_id ) {

		$this->popup_id = $popup_id;
		
	}

	
}
