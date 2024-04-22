<?php
/**
 * Privacy Link
 */

if( !function_exists( 'movedo_ext_vce_privacy_policy_page_link_shortcode' ) ) {

	function movedo_ext_vce_privacy_policy_page_link_shortcode( $atts, $content ) {

		$output = '';

		$page_id = get_option('wp_page_for_privacy_policy');
		if ( !empty( $page_id ) ) {
			if( empty( $content ) ) {
				$content = get_the_title( $page_id );
			}
			$url = get_permalink( $page_id );
			if ( !empty( $url ) ) {
				$output .= '<a href="' . esc_url( $url ) . ' ">' . esc_html( $content ) . '</a>';
			}
		}
		return $output;
	}
	add_shortcode( 'movedo_privacy_policy_page_link', 'movedo_ext_vce_privacy_policy_page_link_shortcode' );

}


//Omit closing PHP tag to avoid accidental whitespace output errors.
