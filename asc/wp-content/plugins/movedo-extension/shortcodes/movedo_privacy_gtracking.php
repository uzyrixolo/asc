<?php
/**
 * Privacy Google Tracking Code Shortcode
 */

if( !function_exists( 'movedo_ext_vce_privacy_gtracking_shortcode' ) ) {

	function movedo_ext_vce_privacy_gtracking_shortcode( $atts, $content ) {

		$output = '';

		if( empty( $content ) ) {
			$content = "Click to enable/disable Google Analytics tracking code.";
		}

		if ( function_exists( 'movedo_grve_get_privacy_switch' ) ) {
			$output .= movedo_grve_get_privacy_switch ( 'grve-privacy-content-gtracking' , $content );
		}

		return $output;
	}
	add_shortcode( 'movedo_privacy_gtracking', 'movedo_ext_vce_privacy_gtracking_shortcode' );

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
