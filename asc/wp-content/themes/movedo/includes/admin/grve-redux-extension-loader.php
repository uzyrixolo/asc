<?php
/**
 * Greatives Redux Extension Loader
 * @version	1.0
 * @author		Greatives Team
 * @URI		http://greatives.eu
 * */

function movedo_grve_ace_cdn_fix( $args ) {
	return get_template_directory_uri() . '/includes/js/ace_editor/ace.js';
}
add_filter("redux/movedo_grve_options/fields/ace/script", 'movedo_grve_ace_cdn_fix' );
add_filter("redux/movedo_grve_optionsfields/ace/script", 'movedo_grve_ace_cdn_fix' );

if ( !function_exists( 'redux_custom_section_menu' ) ) {
	function redux_custom_section_menu( $current, $k, array $section, string $suffix = '', array $sections = array()) {
		return $current->parent->render_class->section_menu( $k, $section, $suffix, $sections );
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
