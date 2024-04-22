<?php

	$output = '';

	extract(
		shortcode_atts(
			array(
				'el_class'        => '',
				'el_id'        => '',
				'rtl_reverse' => '',
				'disable_element' => '',
				'css' => '',
			),
			$atts
		)
	);

	$row_classes = array( 'grve-row-inner', 'grve-bookmark' );

	if ( 'yes' === $disable_element ) {
		if ( vc_is_page_editable() ) {
			$row_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
		} else {
			return '';
		}
	}

	$css_custom = movedo_grve_vc_shortcode_custom_css_class( $css, '' );
	if ( !empty( $css_custom ) ) {
		$row_classes[] = $css_custom;
	}
	if ( !empty ( $el_class ) ) {
		$row_classes[] = $el_class;
	}
	if ( 'yes' == $rtl_reverse ) {
		$row_classes[] = 'grve-rtl-columns-reverse';
	}
	$row_css_string = implode( ' ', $row_classes );

	$wrapper_attributes = array();

	if ( !empty ( $el_id ) ) {
		$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
	}
	$wrapper_attributes[] = 'class="' . esc_attr( $row_css_string ) . '"';

	echo '<div ' . implode( ' ', $wrapper_attributes ) . '>' . do_shortcode( $content ) . '</div>';

//Omit closing PHP tag to avoid accidental whitespace output errors.
