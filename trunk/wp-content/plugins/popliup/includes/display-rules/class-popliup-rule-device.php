<?php
/*
Name:        Devices
Description: Defines display rules concerning display device
Rules:       Only on mobiles, Not on mobiles
Version:     1.0
*/

require_once POPLI_INC_DIR.'class-mobile-detect.php';

class PopliupRule_Device {

	private $detect;

	/**
	 * Initialize the rule object.
	 *
	 * @since  1.0.0
	 */
	public function __construct() { 
		
		$this->detect = new Mobile_Detect;



		PopliupRules::register_rule(
			'on_mobile',
			$this,
			__( 'Only on mobiles', POPLI_LANG ),
			__( 'Show the popup if the user viewing from a mobile.', POPLI_LANG ),
			'not_on_mobile'
		);

		PopliupRules::register_rule(
			'not_on_mobile',
			$this,
			__( 'Not on mobiles', POPLI_LANG ),
			__( 'Do not show the popup if the user viewing from a mobile.', POPLI_LANG ),
			'on_mobile'
		);
		

		
	}

	public function on_mobile_rule_content() {		

	}

	public function not_on_mobile_rule_content() {		

	}

	public function on_mobile_prepare_data() {

	}

	public function not_on_mobile_prepare_data() {		

	}
	

	public function on_mobile_check_display( $condition_data ) { 
		return ( $this->detect->isMobile() ) ? true : false; 
	}

	public function not_on_mobile_check_display( $condition_data ) { 
		return ( !$this->detect->isMobile() ) ? true : false;
	}


};
