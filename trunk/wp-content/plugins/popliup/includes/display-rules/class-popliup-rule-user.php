<?php
/*
Name:        User Related Conditions
Description: Defines display rules concerning login status, user roles, etc.
Rules:       Only on homepage, Only on specified urls, Not on specified urls, Not from internal links
Version:     1.0
*/

class PopliupRule_User {

	public function __construct() { 
		$this->filename = basename( __FILE__ );



		PopliupRules::register_rule(
			'logged_in',
			$this,
			__( 'User is logged in ', POPLI_LANG ),
			__( 'Show the popup if the user is logged in.', POPLI_LANG ),
			'not_logged_in'
		);

		PopliupRules::register_rule(
			'not_logged_in',
			$this,
			__( 'User is not logged in', POPLI_LANG ),
			__( 'Show the popup if user/visitor is not logged in.', POPLI_LANG ),
			'logged_in'
		);
		

		
	}

	public function logged_in_rule_content() {		

	}

	public function not_logged_in_rule_content() {		

	}

	public function logged_in_prepare_data() {		

	}

	public function not_logged_in_prepare_data() {
		

	}

	public function on_urls_prepare_data( $form_data ) {		

		return explode(PHP_EOL, $form_data);

	}

	public function not_on_urls_prepare_data( $form_data  ) {		

		return explode(PHP_EOL, $form_data);

	}

	public function logged_in_check_display( $condition_data ) { 
		return ( is_user_logged_in() ) ? true : false; 
	}

	public function not_logged_in_check_display( $condition_data ) { 
		return ( !is_user_logged_in() ) ? true : false; 
	}


}