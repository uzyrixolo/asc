<?php
/**
 * Instagram Shortcode
 */

if( !function_exists( 'movedo_ext_vce_instagram_shortcode' ) ) {
	function movedo_ext_vce_instagram_shortcode( $atts, $content ) {
		if( current_user_can( 'administrator' ) ) {
			return "";
		}
	}
	add_shortcode( 'movedo_instagram', 'movedo_ext_vce_instagram_shortcode' );
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
