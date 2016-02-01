<?php
/*
Name:        Page and Links
Description: Defines display rules concerning page, url, referrer, etc.
Rules:       Only on homepage, Only on specified urls, Not on specified urls, Not from internal links
Version:     1.0

*/

class PopliupRule_Page {

	
	public function __construct() { 
		$this->filename = basename( __FILE__ );



		PopliupRules::register_rule(
			'only_home',
			$this,
			__( 'Only on the home page', POPLI_LANG ),
			__( 'Show the popup only on the home page.', POPLI_LANG ),
			'on_urls,not_on_urls'
		);

		PopliupRules::register_rule(
			'on_urls',
			$this,
			__( 'Only on specific URLs', POPLI_LANG ),
			__( 'Show the popup only on the home page.', POPLI_LANG ),
			'only_home,not_on_urls'
		);

		PopliupRules::register_rule(
			'not_on_urls',
			$this,
			__( 'Not on specific URLs', POPLI_LANG ),
			__( 'Do not show the popup on the specified URLs.', POPLI_LANG ),
			'only_home,on_urls'
		);

		PopliupRules::register_rule(
			'not_frm_internal_link',
			$this,
			__( 'Not from an internal link', POPLI_LANG ),
			__( 'Do not show the popup if the user arrived from another page on your site.', POPLI_LANG ),
			''
		);
		
	}

	public function only_home_rule_content() {		

	}

	public function only_home_prepare_data() {
		

	}

	public function on_urls_prepare_data( $form_data ) {		

		return explode(PHP_EOL, $form_data);

	}

	public function not_on_urls_prepare_data( $form_data  ) {		

		return explode(PHP_EOL, $form_data);

	}



	public function on_urls_rule_content( $content_data ) {
		$rule_is_active = $content_data['is_active'];
		
		$condition_content = isset( $content_data['on_urls'] )? implode(PHP_EOL,$content_data['on_urls']): '';

		?>

		<div class="condition-content <?php if( !$rule_is_active ) echo 'dnone'; ?>">
			<div class="condition-info">Show the popup on the following URLs (add URLs in separate lines)</div>

			<div>
				<textarea name="popup_conditions_data[on_urls]"><?php if( isset( $condition_content ) ) echo $condition_content; ?></textarea>
			</div>
			
		</div>

		<?php

	}

	public function not_on_urls_rule_content( $content_data ) {
		$rule_is_active = $content_data['is_active'];		
		$condition_content = isset( $content_data['not_on_urls'] )? implode(PHP_EOL,$content_data['not_on_urls']): '';
		

		?>

		<div class="condition-content <?php if( !$rule_is_active ) echo 'dnone'; ?>">
			<div class="condition-info">Do not Show the popup on the following URLs (add URLs in separate lines)</div>

			<div>
				<textarea name="popup_conditions_data[not_on_urls]"><?php if( isset( $condition_content ) ) echo $condition_content; ?></textarea>
			</div>
			
		</div>

		<?php

	}

	public function only_home_check_display( $condition_data ) { 
			return ( is_front_page() && !is_paged() )? true: false; 
	}

	public function on_urls_check_display( $condition_data ) { 
		
		$show_popup = false;

		$urls = $condition_data;
		$current_url = rtrim( $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], '/' );

		foreach( $urls as $url ){
								
			$url = str_replace( array( 'http://', 'https://' ), array( '', '' ), rtrim( $url, '/') );

			if( $url == $current_url ){									
				$show_popup = true;
				break;
			}
		}

		return $show_popup;
	}

	public function not_on_urls_check_display( $condition_data ) { 		

		return !$this->on_urls_check_display( $condition_data );

	}

	public function not_frm_internal_link_check_display( $condition_data ) { 
			$referer_host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
			$site_host = parse_url(site_url(), PHP_URL_HOST);

			return !( $referer_host == $site_host )? true: false; 
	}

}