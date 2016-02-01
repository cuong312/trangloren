<?php
/**
* Theme Name: Minimal
* Version: 1.0
*/

class PopliupTheme_Minimal{

	private $theme_name = 'minimal';

	public function __construct(){
		add_action( 'popliup_theme_options', array($this, 'minimal_theme_options'), 10, 1 );
		add_filter( 'popup_theme_css', array($this, 'minimal_theme_css'), 10,  3 );
	}

	function minimal_theme_options( $display_options ) {

		$popliup_theme_name = $this->theme_name;
		$popup_bg_color = ( isset( $display_options['theme_opts'][$popliup_theme_name]['popup_bg_color'] ) )?$display_options['theme_opts'][$popliup_theme_name]['popup_bg_color']:'#fff';

		?>
		<hr/> 
		<h4> <?php _e('Minimal Theme Options', POPLI_LANG);?> </h4>

			<table>
				<tr>
					<td> Popup box background color  </td>
					<td> <input class="popli-color-picker" type="text" name="display_options[theme_opts][<?php echo $popliup_theme_name; ?>][popup_bg_color]" value="<?php echo $popup_bg_color;?>" > </td>
				</tr>		
			</table>

	<?php }  // end minimal theme options

	function minimal_theme_css( $popup_id, $css, $display_options ){
		$popliup_theme_name = $this->theme_name;
		if( $display_options['popup_theme'] == $popliup_theme_name ) {

			$popup_css =$css.' <style type="text/css"> #popliup-'.$popup_id.' .popliup-content {  background-color: '.$display_options['theme_opts'][$popliup_theme_name]['popup_bg_color'].';  }</style>' ;
			return $popup_css;

		}else{
			return $popup_id;
		}
	}

}

new PopliupTheme_Minimal();