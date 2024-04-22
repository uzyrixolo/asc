<?php
/**
 * Privacy Required Shortcode
 */

if( !function_exists( 'movedo_ext_vce_privacy_required_shortcode' ) ) {

	function movedo_ext_vce_privacy_required_shortcode( $atts, $content ) {

		$output = '';
		
		extract(
			shortcode_atts(
				array(
					'value' => 'required',
				),
				$atts
			)
		);		

		if( empty( $content ) ) {
			$content = "write your required title here";
		}

		if ( function_exists( 'movedo_grve_get_privacy_required' ) ) {
			$output .= movedo_grve_get_privacy_required ( $value , $content );
		}

		return $output;
	}
	add_shortcode( 'movedo_privacy_required', 'movedo_ext_vce_privacy_required_shortcode' );

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
