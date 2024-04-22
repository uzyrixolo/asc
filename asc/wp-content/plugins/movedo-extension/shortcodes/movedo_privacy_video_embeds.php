<?php
/**
 * Privacy Video Embeds Shortcode
 */

if( !function_exists( 'movedo_ext_vce_privacy_video_embeds_shortcode' ) ) {

	function movedo_ext_vce_privacy_video_embeds_shortcode( $atts, $content ) {

		$output = $el_class = '';

		if( empty( $content ) ) {
			$content = "Click to enable/disable video embeds.";
		}

		if ( function_exists( 'movedo_grve_get_privacy_switch' ) ) {
			$output .= movedo_grve_get_privacy_switch ( 'grve-privacy-content-video-embeds' , $content );
		}

		return $output;
	}
	add_shortcode( 'movedo_privacy_video_embeds', 'movedo_ext_vce_privacy_video_embeds_shortcode' );

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
