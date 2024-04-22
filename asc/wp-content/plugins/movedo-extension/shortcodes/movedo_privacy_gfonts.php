<?php
/**
 * Privacy Google Fonts Shortcode
 */

if( !function_exists( 'movedo_ext_vce_privacy_gfonts_shortcode' ) ) {

	function movedo_ext_vce_privacy_gfonts_shortcode( $atts, $content ) {

		$output = '';

		if( empty( $content ) ) {
			$content = "Click to enable/disable Google Fonts.";
		}

		if ( function_exists( 'movedo_grve_get_privacy_switch' ) ) {
			$output .= movedo_grve_get_privacy_switch ( 'grve-privacy-content-gfonts' , $content );
		}

		return $output;
	}
	add_shortcode( 'movedo_privacy_gfonts', 'movedo_ext_vce_privacy_gfonts_shortcode' );

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
