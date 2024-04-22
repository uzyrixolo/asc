<?php

/*
 *	Metabox functions
 *
 * 	@version	1.0
 * 	@author		Greatives Team
 * 	@URI		http://greatives.eu
 */


/**
 * Functions to print global metaboxes
 */
add_action( 'add_meta_boxes', 'movedo_ext_generic_options_add_custom_boxes' );

function movedo_ext_generic_options_add_custom_boxes() {

	if ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) {
		return;
	}

	//General Page Options
	if ( function_exists( 'movedo_grve_page_options_box' ) ) {
		add_meta_box(
			'grve-page-options',
			esc_html__( 'Page Options', 'movedo-extension' ),
			'movedo_grve_page_options_box',
			'page'
		);
		add_meta_box(
			'grve-page-options',
			esc_html__( 'Post Options', 'movedo-extension' ),
			'movedo_grve_page_options_box',
			'post'
		);
		add_meta_box(
			'grve-page-options',
			esc_html__( 'Portfolio Options', 'movedo-extension' ),
			'movedo_grve_page_options_box',
			'portfolio'
		);
		add_meta_box(
			'grve-page-options',
			esc_html__( 'Product Options', 'movedo-extension' ),
			'movedo_grve_page_options_box',
			'product'
		);
		add_meta_box(
			'grve-page-options',
			esc_html__( 'Events Options', 'movedo-extension' ),
			'movedo_grve_page_options_box',
			'tribe_events'
		);

	}

	if ( function_exists( 'movedo_grve_option' ) && function_exists( 'movedo_grve_page_feature_section_box' )  ) {
		$feature_section_post_types = movedo_grve_option( 'feature_section_post_types');

		if ( !empty( $feature_section_post_types ) ) {

			foreach ( $feature_section_post_types as $key => $value ) {

				if ( 'attachment' != $value ) {

					add_meta_box(
						'grve-feature-section-metabox',
						esc_html__( 'Feature Section', 'movedo' ),
						'movedo_grve_page_feature_section_box',
						$value,
						'advanced',
						'low'
					);

				}

			}
		}
	}
}

/**
 * Functions to print portfolio metaboxes
 */

add_action( 'add_meta_boxes', 'movedo_ext_portfolio_options_add_custom_boxes' );

function movedo_ext_portfolio_options_add_custom_boxes() {

	if ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) {
		return;
	}

	if ( function_exists( 'movedo_grve_portfolio_link_mode_box' ) ) {
		add_meta_box(
			'grve-meta-box-portfolio-link-mode',
			esc_html__( 'Portfolio Link Options', 'movedo-extension' ),
			'movedo_grve_portfolio_link_mode_box',
			'portfolio'
		);
	}
	if ( function_exists( 'movedo_grve_portfolio_overview_mode_box' ) ) {
		add_meta_box(
			'grve-meta-box-portfolio-overview-mode',
			esc_html__( 'Portfolio Overview Options', 'movedo-extension' ),
			'movedo_grve_portfolio_overview_mode_box',
			'portfolio'
		);
	}
	if ( function_exists( 'movedo_grve_portfolio_media_section_box' ) ) {
		add_meta_box(
			'grve-meta-box-portfolio-media-section',
			esc_html__( 'Portfolio Media', 'movedo-extension' ),
			'movedo_grve_portfolio_media_section_box',
			'portfolio'
		);
	}
	if ( function_exists( 'movedo_grve_second_featured_image_section_box' ) ) {
		add_meta_box(
			'grve-meta-box-portfolio-second-featured-image',
			esc_html__( 'Second Featured Image', 'movedo-extension' ),
			'movedo_grve_second_featured_image_section_box',
			'portfolio',
			'side',
			'low'
		);
	}
}

/**
 * Functions to print post metaboxes
 */
add_action( 'add_meta_boxes', 'movedo_ext_post_options_add_custom_boxes' );

function movedo_ext_post_options_add_custom_boxes() {

	if ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) {
		return;
	}
	if ( function_exists( 'movedo_grve_meta_box_post_format_standard' ) ) {
		add_meta_box(
			'grve-meta-box-post-format-standard',
			esc_html__( 'Standard Format Options', 'movedo-extension' ),
			'movedo_grve_meta_box_post_format_standard',
			'post'
		);
	}
	if ( function_exists( 'movedo_grve_meta_box_post_format_gallery' ) ) {
		add_meta_box(
			'grve-meta-box-post-format-gallery',
			esc_html__( 'Gallery Format Options', 'movedo-extension' ),
			'movedo_grve_meta_box_post_format_gallery',
			'post'
		);
	}
	if ( function_exists( 'movedo_grve_meta_box_post_format_link' ) ) {
		add_meta_box(
			'grve-meta-box-post-format-link',
			esc_html__( 'Link Format Options', 'movedo-extension' ),
			'movedo_grve_meta_box_post_format_link',
			'post'
		);
	}
	if ( function_exists( 'movedo_grve_meta_box_post_format_quote' ) ) {
		add_meta_box(
			'grve-meta-box-post-format-quote',
			esc_html__( 'Quote Format Options', 'movedo-extension' ),
			'movedo_grve_meta_box_post_format_quote',
			'post'
		);
	}
	if ( function_exists( 'movedo_grve_meta_box_post_format_video' ) ) {
		add_meta_box(
			'grve-meta-box-post-format-video',
			esc_html__( 'Video Format Options', 'movedo-extension' ),
			'movedo_grve_meta_box_post_format_video',
			'post'
		);
	}
	if ( function_exists( 'movedo_grve_meta_box_post_format_audio' ) ) {
		add_meta_box(
			'grve-meta-box-post-format-audio',
			esc_html__( 'Audio Format Options', 'movedo-extension' ),
			'movedo_grve_meta_box_post_format_audio',
			'post'
		);
	}

}

/**
 * Functions to print testimonial metaboxes
 */

add_action( 'add_meta_boxes', 'movedo_ext_testimonial_options_add_custom_boxes' );

function movedo_ext_testimonial_options_add_custom_boxes() {

	if ( function_exists( 'movedo_grve_testimonial_options_box' ) ) {
		add_meta_box(
			'grve-meta-box-testimonial-options',
			esc_html__( 'Testimonial Options', 'movedo-extension' ),
			'movedo_grve_testimonial_options_box',
			'testimonial'
		);
	}

}
//Omit closing PHP tag to avoid accidental whitespace output errors.
