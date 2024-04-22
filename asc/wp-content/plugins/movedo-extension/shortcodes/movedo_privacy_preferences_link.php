<?php
/**
 * Privacy Link
 */

if( !function_exists( 'movedo_ext_vce_privacy_preferences_link_shortcode' ) ) {

	function movedo_ext_vce_privacy_preferences_link_shortcode( $atts, $content ) {

		$output = '';

		if ( function_exists( 'movedo_grve_get_privacy_preferences_link' ) ) {
			$output .= movedo_grve_get_privacy_preferences_link ( $content );
		}
		return $output;
	}
	add_shortcode( 'movedo_privacy_preferences_link', 'movedo_ext_vce_privacy_preferences_link_shortcode' );

}


//Omit closing PHP tag to avoid accidental whitespace output errors.
