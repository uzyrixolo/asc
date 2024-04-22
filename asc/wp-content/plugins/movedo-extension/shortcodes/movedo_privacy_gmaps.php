<?php
/**
 * Privacy Google Maps Shortcode
 */

if( !function_exists( 'movedo_ext_vce_privacy_gmaps_shortcode' ) ) {

	function movedo_ext_vce_privacy_gmaps_shortcode( $atts, $content ) {

		$output = '';

		if( empty( $content ) ) {
			$content = "Click to enable/disable Google Maps.";
		}

		if ( function_exists( 'movedo_grve_get_privacy_switch' ) ) {
			$output .= movedo_grve_get_privacy_switch ( 'grve-privacy-content-gmaps' , $content );
		}

		return $output;
	}
	add_shortcode( 'movedo_privacy_gmaps', 'movedo_ext_vce_privacy_gmaps_shortcode' );

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
