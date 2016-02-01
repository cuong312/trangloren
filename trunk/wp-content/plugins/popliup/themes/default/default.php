<?php
/**
* Theme Name: Default
* Version: 1.0
*/


class PopliupTheme_Default{

	private $theme_name = 'default';

	public function __construct(){
		add_action( 'popliup_theme_options', array($this, 'default_theme_options'), 10, 1 );
		add_filter( 'popup_theme_css', array($this, 'default_theme_css'), 10,  3 );
	}


	function default_theme_options( $display_options ) {

			$popliup_theme_name = $this->theme_name;

			$popup_bg_color = ( isset( $display_options['theme_opts'][$popliup_theme_name]['popup_bg_color'] ) )?$display_options['theme_opts'][$popliup_theme_name]['popup_bg_color']:'#efefef';
			$popup_border_color = ( isset( $display_options['theme_opts'][$popliup_theme_name]['popup_border_color'] ) )?$display_options['theme_opts'][$popliup_theme_name]['popup_border_color']:'rgba(224, 224, 224, 0.61)';
			$popup_border_width = ( isset( $display_options['theme_opts'][$popliup_theme_name]['popup_border_width'] ) )?$display_options['theme_opts'][$popliup_theme_name]['popup_border_width']:'10';

		?>
		<hr/> 
		<h4> <?php _e('Default Theme Options', POPLI_LANG);?> </h4>

			<table>
				<tr>
					<td> Popup box background color  </td>
					<td> <input class="popli-color-picker" type="text" name="display_options[theme_opts][default][popup_bg_color]" value="<?php echo $popup_bg_color;?>" > </td>
				</tr>

				<tr>
					<td> Popup box border color  </td>
					<td> <input class="popli-color-picker" type="text" name="display_options[theme_opts][default][popup_border_color]" value="<?php echo $popup_border_color;?>" > </td>
				</tr>

				<tr>
					<td> Border width  </td>
					<td> <input type="number" min="0" max="1000" name="display_options[theme_opts][default][popup_border_width]" value="<?php echo $popup_border_width;?>" > px </td>
				</tr>
			</table>

	<?php }  // end default theme options


	function default_theme_css( $popup_id, $css, $display_options ){

		$popliup_theme_name = $this->theme_name;

		if( $display_options['popup_theme'] == $popliup_theme_name ) {
		
			$popup_css =$css.' <style type="text/css"> #popliup-'.$popup_id.' {  background-color: '.$display_options['theme_opts'][$popliup_theme_name]['popup_border_color'].'; padding: '.$display_options['theme_opts'][$popliup_theme_name]['popup_border_width'].'px;  } #popliup-'.$popup_id.' .popliup-content { background-color: '.$display_options['theme_opts'][$popliup_theme_name]['popup_bg_color'].'; }</style>' ;
			return $popup_css;

		}else{
			return $popup_id;
		}
	}

}

new PopliupTheme_Default();