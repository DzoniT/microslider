<?php if ( ! defined( 'ABSPATH' ) ) die('No permissions to access this page!'); ?>
<div class="wrap">
	<div id="icon-options-general" class="icon32">
		<br>
	</div>
	
	<h2><?php _e('nanoslider Settings', 'nanoslider'); ?></h2>
	<?php echo !$alert ? '' : '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>'. $alert .'</strong></p></div>'; ?>
	<p><?php _e('Here you can configure nanoslider plugin', 'nanoslider'); ?>.</p>
	
	<form action="" method="POST" class="nanoslider_settings">
		<?php wp_nonce_field('nanoslider-admin-nonce'); ?>
<?php

if(function_exists( 'wp_enqueue_media' )){
	wp_enqueue_media();
}else{
	wp_enqueue_style('thickbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}

echo '<div style="max-width:70%" id="sliders_preview">';

if(isset($nanoslider_options) && $nanoslider_options != ''){
	
	$nanoslider_images = explode(',', $nanoslider_options['nanoslider_images']);
	
	foreach($nanoslider_images as $nsimage){
		echo '<div class="slimage">';
		echo	'<img width="390" height="100" class="sourceimg" style="margin:5px;" src="'. esc_attr($nsimage) .'" />';
		echo 	'<img class="sli_close" src="'. get_template_directory_uri() .'/images/close.png" />';
		echo '</div>';
	}
	
}

echo '</div>';

echo '<input type="hidden" value="'. get_template_directory_uri() .'/images/close.png" id="close_icon" />';

?>
		<br />
		<small><?php _e('Recomended size: width: 900px, height: 300px.', 'nanoslider'); ?></small>
		<br />
		<br />
		<input class="slider_urls" type="hidden" name="nanoslider_images" size="40" value="<?php echo esc_attr($nanoslider_options['nanoslider_images']); ?>">
		
		<a href="#" id="slider_upload" class="slider_upload browser button button-hero"><?php _e('Add Images', 'nanoslider'); ?></a>   

		<p>

		<div class="nanoslider_settings_section">
		
			<hr />
			
			<p>
					<label><?php _e('Turn on or off autorun of front page image slider', 'nanoslider'); ?></label>&nbsp&nbsp
					<input type="checkbox" name="nanoslider_s_auto" <?php checked( $nanoslider_options['nanoslider_s_auto'] == 1, 1 ); ?> value="1">
			</p>
			
			<hr />
			
			<p>
				<label><?php _e('Slider transition type', 'nanoslider'); ?>:</label>
				<select name="nanoslider_s_type">
					<option <?php echo $nanoslider_options['nanoslider_s_type'] == 'horizontal' ? 'selected' : ''; ?> value="horizontal"><?php _e('Horizontal', 'nanoslider'); ?></option>
					<option <?php echo $nanoslider_options['nanoslider_s_type'] == 'vertical' ? 'selected' : ''; ?> value="vertical"><?php _e('Vertical', 'nanoslider'); ?></option>
					<option <?php echo $nanoslider_options['nanoslider_s_type'] == 'fade' ? 'selected' : ''; ?> value="fade"><?php _e('Fade', 'nanoslider'); ?></option>
				</select>
			</p>

			<hr />
			
			<p><label><?php _e('Pause time between transitions', 'nanoslider'); ?>:</label><p>
			<p>
				<input type="range" style="display:block;" class="nanoslider_range_input" name="nanoslider_s_pause" id="nanoslider_s_pause" value="<?php echo isset($nanoslider_options['nanoslider_s_pause']) ? esc_attr($nanoslider_options['nanoslider_s_pause']) : 0; ?>" min="0" max="10000" step="100">	
				<output style="font-weight:bold;" class="nanoslider_range_output"><?php echo isset($nanoslider_options['nanoslider_s_pause']) ? esc_attr($nanoslider_options['nanoslider_s_pause']) : 0; ?></output>&nbsp&nbsp - &nbsp&nbsp <small><?php _e('(in milliseconds, 1 second = 1000 miliseconds)', 'nanoslider'); ?></small>
			</p>
			
			<hr />
			
			<p><label><?php _e('Speed of transition between slides', 'nanoslider'); ?>:</label><p>
			<p>
				<input type="range" style="display:block;" class="nanoslider_range_input" name="nanoslider_s_trspeed" id="nanoslider_s_trspeed" value="<?php echo isset($nanoslider_options['nanoslider_s_trspeed']) ? esc_attr($nanoslider_options['nanoslider_s_trspeed']) : 0; ?>" min="0" max="10000" step="100">	
				<output style="font-weight:bold;" class="nanoslider_range_output"><?php echo isset($nanoslider_options['nanoslider_s_trspeed']) ? esc_attr($nanoslider_options['nanoslider_s_trspeed']) : 0; ?></output>&nbsp&nbsp - &nbsp&nbsp <small><?php _e('(in milliseconds, 1 second = 1000 miliseconds)', 'nanoslider'); ?></small>
			</p>
			
			<hr />
			
			<p>
				<label><?php _e('Turn on or turn off slider pager circles', 'nanoslider'); ?></label>&nbsp&nbsp
				<input type="checkbox" name="nanoslider_s_pager" <?php checked( isset($nanoslider_options['nanoslider_s_pager']), 1 ); ?> value="1">
			<p>
			
			<hr />

			
			<p>
				<label><?php _e('Pager distance from the lower edge of the slider (in pixels)', 'nanoslider'); ?></label>&nbsp&nbsp
				<input type="input" name="nanoslider_s_pagepos" value="<?php echo isset($nanoslider_options['nanoslider_s_pagepos']) ? esc_attr($nanoslider_options['nanoslider_s_pagepos']) : 0; ?>" />
			<p>			
			
			<hr />

			
			<p>
				<label><?php _e('Turn on or turn off slider left/right arrow navigation', 'nanoslider'); ?></label>&nbsp&nbsp
				<input type="checkbox" name="nanoslider_s_controls" <?php checked( isset($nanoslider_options['nanoslider_s_controls']), 1 ); ?> value="1">
			<p>
			

			<hr />
			
			

		</p>
		<p>
			<input type="submit" class="button-primary nanoslider_submit" name="submit_nanoslider_data" value="<?php _e('Save changes', 'nanoslider'); ?>" />
		</p>
	</form>
	
</div>