<?php

	extract(
		shortcode_atts(
			array(
				'block_content' => '',
				'width' => '1/1',
				'font_color' => '',
				'desktop_hide' => '',
				'tablet_width' => '',
				'tablet_sm_width' => '',
				'mobile_width' => '',
				'el_class' => '',
				'el_wrapper_class' => '',
				'el_id' => '',
				'offset' => '',
				'css' => '',
			),
			$atts
		)
	);

	switch( $width ) {
		case '1/12':
			$shortcode_column = '1-12';
			break;
		case '1/6':
			$shortcode_column = '1-6';
			break;
		case '1/4':
			$shortcode_column = '1-4';
			break;
		case '1/3':
			$shortcode_column = '1-3';
			break;
		case '5/12':
			$shortcode_column = '5-12';
			break;
		case '1/2':
			$shortcode_column = '1-2';
			break;
		case '7/12':
			$shortcode_column = '7-12';
			break;
		case '2/3':
		case '4/6':
			$shortcode_column = '2-3';
			break;
		case '3/4':
			$shortcode_column = '3-4';
			break;
		case '5/6':
			$shortcode_column = '5-6';
			break;
		case '11/12':
			$shortcode_column = '11-12';
			break;
		case '1/5':
			$shortcode_column = '1-5';
			break;
		case '2/5':
			$shortcode_column = '2-5';
			break;
		case '3/5':
			$shortcode_column = '3-5';
			break;
		case '4/5':
			$shortcode_column = '4-5';
			break;
		case '1/1':
		default :
			$shortcode_column = '1';
			break;
	}

	$column_classes = array( 'grve-column-inner', 'wpb_column' );
	$column_classes[] = 'grve-column-' . $shortcode_column;

	$css_custom = movedo_grve_vc_shortcode_custom_css_class( $css, '' );


	if( vc_settings()->get( 'not_responsive_css' ) != '1') {

		if ( !empty( $desktop_hide ) ) {
			$column_classes[] = 'grve-desktop-column-' . $desktop_hide;
		}
		if ( !empty( $tablet_width ) ) {
			$column_classes[] = 'grve-tablet-column-' . $tablet_width;
		}
		if ( !empty( $tablet_sm_width ) ) {
			$column_classes[] = 'grve-tablet-sm-column-' . $tablet_sm_width;
		} else {
			if ( !empty( $tablet_width ) ) {
				$column_classes[] = 'grve-tablet-sm-column-' . $tablet_width;
			}
		}
		if ( !empty( $mobile_width ) ) {
			$column_classes[] = 'grve-mobile-column-' . $mobile_width;
		}
	}

	if ( !empty ( $el_class ) ) {
		$column_classes[] = $el_class;
	}
	if ( !empty ( $responsive_class ) ) {
		$column_classes[] = $responsive_class;
	}

	$column_string = implode( ' ', $column_classes );

	$wrapper_attributes = array();
	$wrapper_attributes[] = 'class="' . esc_attr( $column_string ) . '"';

	$style = movedo_grve_build_shortcode_style(
		array(
			'font_color' => $font_color,
		)
	);

	if ( ! empty( $el_id ) ) {
		$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
	}

	if( !empty( $style ) ) {
		$wrapper_attributes[] = $style;
	}

	$column_wrapper_classes = array( 'grve-column-wrapper-inner' );
	if ( !empty( $css_custom ) ) {
		$column_wrapper_classes[] = $css_custom;
	}
	if ( !empty ( $el_wrapper_class ) ) {
		$column_wrapper_classes[] = $el_wrapper_class;
	}
	$column_wrapper_string = implode( ' ', $column_wrapper_classes );

	$output_content = '';
	if ( !empty( $block_content ) && !movedo_grve_is_privacy_key_enabled( $block_content ) ) {
		$output_content .= movedo_grve_privacy_disable_fallback( $block_content );
	} else {
		$output_content .= do_shortcode( $content );
	}

	echo '
		<div ' . implode( ' ', $wrapper_attributes ) . '>
			<div class="' . esc_attr( $column_wrapper_string ) . '">
			' . $output_content . '
			</div>
		</div>
	';

//Omit closing PHP tag to avoid accidental whitespace output errors.
