<?php
/**
 * Privacy Custom Shortcode
 */

if( !function_exists( 'movedo_ext_vce_privacy_custom_shortcode' ) ) {

	function movedo_ext_vce_privacy_custom_shortcode( $atts, $content ) {

		$output = '';

		extract(
			shortcode_atts(
				array(
					'id' => 'custom',
				),
				$atts
			)
		);

		if( empty( $content ) ) {
			$content = "Click to enable/disable custom content.";
		}
		if( empty( $id ) ) {
			$id = 'custom-id';
		}
		$id = sanitize_title_with_dashes( $id );

		if ( function_exists( 'movedo_grve_get_privacy_switch' ) ) {
			$output .= movedo_grve_get_privacy_switch ( 'grve-privacy-content-' . esc_attr( $id ) , $content );
		}

		return $output;
	}
	add_shortcode( 'movedo_privacy_custom', 'movedo_ext_vce_privacy_custom_shortcode' );

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
