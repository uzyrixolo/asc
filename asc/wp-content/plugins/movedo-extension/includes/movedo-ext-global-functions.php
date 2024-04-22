<?php

/*
*	Global Parameter and functions
*
* 	@version	1.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

 /**
 * Helper function to get array value with fallback
 */
if ( !function_exists( 'movedo_ext_vce_array_value' ) ) {
	function movedo_ext_vce_array_value( $input_array, $id, $fallback = false, $param = false ) {

		if ( $fallback == false ) $fallback = '';
		$output = ( isset($input_array[$id]) && $input_array[$id] !== '' ) ? $input_array[$id] : $fallback;
		if ( !empty($input_array[$id]) && $param ) {
			$output = ( isset($input_array[$id][$param]) && $input_array[$id][$param] !== '' ) ? $input_array[$id][$param] : $fallback;
		}
		return $output;
	}
}

function movedo_ext_print_post_bg_image( $image_size = 'movedo-grve-fullscreen' ) {
	if ( has_post_thumbnail() ) {
		$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
		$attachment_src = wp_get_attachment_image_src( $post_thumbnail_id, $image_size );
		$image_url = $attachment_src[0];
?>
		<div class="grve-bg-image" style="background-image: url(<?php echo esc_url( $image_url ); ?>);"></div>
<?php
	}
}

function movedo_ext_print_select_options( $selector_array, $current_value = "" ) {
	foreach ( $selector_array as $value=>$display_value ) {
	?>
		<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $current_value, $value ); ?>><?php echo esc_html( $display_value ); ?></option>
	<?php
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
