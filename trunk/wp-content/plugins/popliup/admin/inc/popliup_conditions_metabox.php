<?php
/**
 * Metabox "Popliup Display Conditions"
 *
 */

$active_conditions = $this->get_active_conditions($post->ID);
$conditions_data = $this->get_conditions_data($post->ID);

?>


<div id="allConditions">

	<?php

		$all_conditions = $this->popliup_conditions->get_display_rules();	

		foreach( $all_conditions as $condition ){
			$is_active = ( in_array( $condition->name, $active_conditions ) )? true : false;
  			$input_id = lcfirst( str_replace(' ', '', ucwords(str_replace('-', ' ', $condition->name ) ) ) ).'Cb';  
  			$content_function =  $condition->name.'_rule_content';
  			
  			$condition_content_data = array();
  			$condition_content_data['is_active'] = $is_active;

  			if( isset($conditions_data[$condition->name]) ) {
  				$condition_content_data[$condition->name] = $conditions_data[$condition->name];
			}

		?>

		<div id="condition-<?php echo $condition->name; ?>" class="condition <?php if($is_active) echo 'active'; ?>">
			<div class="condition-title">
				<div style="float:left; max-width: 80%;">
				<h2><?php echo $condition->title; ?></h2>
				<span class="condition-desp"> <?php echo $condition->description; ?> </span>
				</div>
				<div style="float:right;">
					<span class="condition-toggle"><input id="<?php echo $input_id; ?>" type="checkbox" name="popup_conditions[]" value="<?php echo $condition->name; ?>" <?php if( $is_active ){ echo 'checked';} ?> data-disable="<?php echo $condition->opp_rules; ?>" data-toggle="toggle"  data-onstyle="success"></span>
				</div>
				<div class="clear"></div>
			</div>
				<?php if( method_exists($condition->obj, $content_function)) { $condition->obj->{$content_function}( $condition_content_data ); } ?>
		</div>

		<?php } ?>	

</div>

