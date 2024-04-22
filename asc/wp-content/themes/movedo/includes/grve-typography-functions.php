<?php

/*
*	Typography Helper functions
*
* 	@version	1.0
 * 	@author		Greatives Team
 * 	@URI		https://greatives.eu
*/

function movedo_grve_print_typography_responsive( $movedo_grve_responsive_fonts = array() , $threshold = 35, $ratio = 0.7, $mode = '' ) {

	$css = '';

	if ( !empty( $movedo_grve_responsive_fonts ) && $ratio < 1 ) {

		foreach ( $movedo_grve_responsive_fonts as $font ) {
			$movedo_grve_size = movedo_grve_option( $font['id'], '32px', 'font-size'  );
			$movedo_grve_size = filter_var( $movedo_grve_size, FILTER_SANITIZE_NUMBER_INT );
			$line_height = movedo_grve_option( $font['id'], '32px', 'line-height'  );
			$line_height = filter_var( $line_height, FILTER_SANITIZE_NUMBER_INT );

			if ( $movedo_grve_size >= $threshold ) {
				$custom_line_height = $line_height / $movedo_grve_size;
				$custom_size = $movedo_grve_size * $ratio;

				if ( 'link_text' == $font['id'] ) {
					$css .= $font['selector'] . " {
						font-size: " . round( $custom_size, 0 ) . "px !important;
						line-height: " . round( $custom_line_height, 2 ) . "em;
					}
					";
				} else {
					$css .= $font['selector'] . " {
						font-size: " . round( $custom_size, 0 ) . "px;
						line-height: " . round( $custom_line_height, 2 ) . "em;
					}
					";
				}
			}

			if ( isset( $font['custom_selector'] ) ) {
				$sizes = array( '120', '140', '160', '180', '200', '250', '300' );
				foreach ( $sizes as $size ) {
					$custom_size = $movedo_grve_size * ( $size / 100 );
					if ( $custom_size >= $threshold ) {
						if ( '250' == $size || '300' == $size ) {
							$custom_size = $movedo_grve_size * ( $ratio / 1.7 );
						} elseif ( '200' == $size ) {
							$custom_size = $movedo_grve_size * ( $ratio / 1.4 );
						} else {
							$custom_size = $movedo_grve_size * ( $ratio / 1.15 );
						}
						if( !empty ( $mode ) ) {
							$css .= $font['custom_selector'] . ".grve-heading-" . esc_attr( $size ) .":not(.grve-" . esc_attr( $mode ) . "-reset-increase-heading ) {
								font-size: " . round( $custom_size, 0 ) . "px;
							}
							";
						} else {
							$css .= $font['custom_selector'] . ".grve-heading-" . esc_attr( $size ) ." {
								font-size: " . round( $custom_size, 0 ) . "px;
							}
							";
						}

					}
				}
			}

		}

	}

	return $css;
}


//Omit closing PHP tag to avoid accidental whitespace output errors.
