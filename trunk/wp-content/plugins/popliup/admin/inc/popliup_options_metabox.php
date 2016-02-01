<?php
/**
 * Metabox "Display Options"
 *
 */

$display_options = get_post_meta( $post->ID, 'popli_display_options', true );


	$appear_after_type 			= ( isset( $display_options['appear_after_type'] ) ) ? $display_options['appear_after_type'] :'time';
	$appear_after_time 			= ( isset( $display_options['after_time'] ) ) ? $display_options['after_time'] : 0;
	$appear_after_scroll 		= ( isset( $display_options['after_scroll'] ) ) ? $display_options['after_scroll'] :'';
	$appear_after_scroll_unit 	= ( isset( $display_options['appear_after_scroll_unit'] ) ) ? $display_options['appear_after_scroll_unit'] :'';
	$expire_after_days 			= ( isset( $display_options['expire_after_days'] ) ) ? $display_options['expire_after_days'] : 0;
	

	$popup_width 		= ( isset( $display_options['popup_width'] ) ) ? $display_options['popup_width'] :'500px';
	$overlay_opacity 	= ( isset( $display_options['overlay_opacity'] ) ) ? $display_options['overlay_opacity'] :'0.5';
	$overlay_color 		= ( isset( $display_options['overlay_color'] ) ) ? $display_options['overlay_color'] :'#444';
	$autoclose_time		= ( isset( $display_options['autoclose_time'] ) ) ? $display_options['autoclose_time'] :'10';
	$animation_duration = ( isset( $display_options['animation_duration'] ) ) ? $display_options['animation_duration'] :'1';


?>



<div id="popliDsiaplyOptionsHldr">
	

	<div>  
		<label>
			<input type="radio" name="display_options[appear_after_type]" <?php if( 'time' == $appear_after_type ) echo 'checked';  ?> value="time" /> 
			<?php _e('Display popup after', POPLI_LANG); ?>
			<input type="number" name="display_options[after_time]"  min="0" max="10000" value="<?php echo $appear_after_time; ?>" /> <?php _e('seconds of page load', POPLI_LANG); ?>
		</label>
	</div>

	<div>
	<label>
		<input type="radio" name="display_options[appear_after_type]" <?php if( 'scroll' == $appear_after_type ) echo 'checked';  ?>  value="scroll" /> 
		<?php _e('Display popup after', POPLI_LANG); ?> <input type="number" min="0" max="10000" name="display_options[after_scroll]" value="<?php echo $appear_after_scroll; ?>" /> <select name="display_options[scroll_unit]"><option <?php if( 'pct' == $appear_after_scroll_unit ) echo 'selected'; ?> value="pct">%</option><option <?php if( 'px' == $appear_after_scroll_unit ) echo 'selected'; ?> value="px">px</option></select> <?php _e( 'of page has been scrolled', POPLI_LANG ); ?>
	</label>
	</div>

	<div id="hideOnScrollUp" style="display:none;">
		<label>
			<input type="checkbox" name="display_options[hide_on_scrollup]" <?php if( 'scroll' == $appear_after_type ) echo 'checked';  ?>  value="1" /> 
			<?php _e('Hide popup when scrolled up', POPLI_LANG); ?> </em>
		</label>
	</div>
	

	<div>
		<label><?php _e('Display popup at the', POPLI_LANG); ?>
	
			<select name="display_options[popup_position]" style="vertical-align:middle;">
			<option <?php if( isset( $display_options['popup_position'] ) && $display_options['popup_position'] == 'center' ){ echo 'selected="selected"';} ?> value="center"><?php _e('Center', POPLI_LANG); ?> </option>
			<option <?php if( isset( $display_options['popup_position'] ) && $display_options['popup_position'] == 'top-left' ){ echo 'selected="selected"';} ?> value="top-left"><?php _e('Top Left', POPLI_LANG); ?> </option>
			<option <?php if( isset( $display_options['popup_position'] ) && $display_options['popup_position'] == 'top-right' ){ echo 'selected="selected"';} ?> value="top-right"><?php _e('Top Right', POPLI_LANG); ?> </option>
			<option <?php if( isset( $display_options['popup_position'] ) && $display_options['popup_position'] == 'bottom-left' ){ echo 'selected="selected"';} ?> value="bottom-left"><?php _e('Bottom Left', POPLI_LANG); ?> </option>
			<option <?php if( isset( $display_options['popup_position'] ) && $display_options['popup_position'] == 'bottom-right' ){ echo 'selected="selected"';} ?> value="bottom-right"><?php _e('Bottom Right', POPLI_LANG); ?> </option>
			</select>
			<?php _e('of the page', POPLI_LANG); ?>
	</div>

	


	<hr/>
	<h4><?php _e('"Do not show popup" Settings', POPLI_LANG); ?></h4>
	

	<div>
		<label>
			<input type="checkbox" name="display_options[close_btn_no_show]" <?php if( isset( $display_options['close_btn_no_show'] ) && $display_options['close_btn_no_show'] == 1 ) echo 'checked';  ?>  value="1" />
			<?php _e('Clicking the close button doesn\'t show the popup again', POPLI_LANG); ?>
		</label>
	</div>

	<div>
		<label>
			<?php _e('Show the popup again to the user after', POPLI_LANG); ?> <input type="number" min="0" max="1000" name="display_options[expire_after_days]" value="<?php echo $expire_after_days; ?>" /> <?php _e('days once it has been closed ', POPLI_LANG); ?>
		</label>
	</div>

	<div>
	<label>
		<input type="checkbox" name="display_options[test_mode]" <?php if( isset( $display_options['test_mode'] ) && $display_options['test_mode'] == 1 ) echo 'checked';  ?>  value="1" /> 
		<?php _e('Enable test mode (popup is shown to the admin irrespective of the above settings)', POPLI_LANG); ?> <?php // TODO: add feature to select from shown and close in the pro version ?>
	</label>
	</div>
	

	<hr/>
	<h4><?php _e('Appearance', POPLI_LANG); ?></h4>

	<table>
		<tr>
			<td> 
				<label>
					<input type="checkbox" name="display_options[enable_rounded_corners]" <?php if( isset( $display_options['enable_rounded_corners'] ) && $display_options['enable_rounded_corners'] == 1  ) echo 'checked';  ?>  value="1" /> <?php _e('Popup has rounded corners', POPLI_LANG); ?> 
				</label> 
			</td>
			
		</tr>
		<tr>
			<td> <?php _e('Overlay color', POPLI_LANG); ?> </td>
			<td> <input class="popli-color-picker" type="text" name="display_options[overlay_color]" value="<?php echo $overlay_color;?>" > </td>
		</tr>
		<tr>
			<td> <?php _e('Overlay opacity', POPLI_LANG); ?>  </td>
			<td> <input type="number" name="display_options[overlay_opacity]" min="0" step="0.1" max="1" value="<?php echo $overlay_opacity; ?>"> </td>
		</tr>		

		<tr>
			<td> <?php _e('Popup box width', POPLI_LANG); ?>  </td>
			<td> <input type="text" size="10" name="display_options[popup_width]" value="<?php echo $popup_width; ?>" />  </td>
		</tr>		

	</table>
	

	<hr/>
	<h4><?php _e('Popup Theme', POPLI_LANG); ?></h4>
	<?php $all_themes = $this->get_themes(); 
	if( !isset( $display_options['popup_theme'] ) ) {
		$display_options['popup_theme'] =  'default';
	}
	
	?>
	<select name="display_options[popup_theme]" data-popup_id="<?php echo $post->ID; ?>" style="vertical-align:middle;">
		<?php foreach($all_themes as $theme ){?>
			<option <?php if( $display_options['popup_theme'] == $theme['slug'] ){echo 'selected="selected"';}?>value="<?php echo $theme['slug']; ?>"><?php echo $theme['name']; ?></option>
		<?php } ?>			
	</select>	

	<div id="popliupThemeOptions">
		<?php do_action('popliup_theme_options', $display_options ); ?>
	</div>

</div>