<?php

/*
*	Theme update functions
*
* 	@version	1.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

/**
 * Display theme update notices in the admin area
 */
function movedo_grve_admin_notices() {

	$message = '';
	if ( is_super_admin() ) {

		if ( ( defined( 'MOVEDO_EXT_VERSION' ) && version_compare( '3.0', MOVEDO_EXT_VERSION, '>' ) ) && !get_user_meta( get_current_user_id(), 'movedo_grve_dismissed_notice_update_plugins', true ) ) {

			$plugins_link = 'admin.php?page=movedo-tgmpa-install-plugins';
			$message = esc_html__( "Note: Movedo v3 is a major theme release so be sure to update the required plugins, especially Movedo Extension, to avoid any compatibility issues.", 'movedo' ) .
						" <a href='" . esc_url( admin_url() . $plugins_link ) . "'>" . esc_html__( "Theme Plugins", 'movedo' ) . "</a>";
			$message .=  '<br/><span><a href="' .esc_url( wp_nonce_url( add_query_arg( 'movedo-grve-dismiss', 'dismiss_update_plugins_notice' ), 'movedo-grve-dismiss-' . esc_attr( get_current_user_id() ) ) ) . '" class="dismiss-notice" target="_parent">' . esc_html__( "Dismiss this notice", 'movedo' ) . '</a><span>';
			add_settings_error(
				'grve-theme-update-message',
				'plugins_update_required',
				$message,
				'updated'
			);
			if ( 'options-general' !== $GLOBALS['current_screen']->parent_base ) {
				settings_errors( 'grve-theme-update-message' );
			}

		}

		if ( !class_exists( 'Envato_Market' ) && !get_user_meta( get_current_user_id(), 'movedo_grve_dismissed_notice_envato_market', true ) ) {

			$envato_market_link = 'admin.php?page=movedo-tgmpa-install-plugins';
			$message = esc_html__( "Note:", "movedo" ) . " " . esc_html__( "Envato official solution is recommended for theme updates using the new Envato Market API.", 'movedo' ) .
					"<br/>" . esc_html__( "You can now update the theme using the", 'movedo' ) . " " . "<a href='" . esc_url( admin_url() . $envato_market_link ) . "'>" . esc_html__( "Envato Market", 'movedo' ) . "</a>" . " ". esc_html__( "plugin", 'movedo' ) . "." .
					" " . esc_html__( "For more information read the related article in our", 'movedo' ) . " " . "<a href='//docs.greatives.eu/tutorials/envato-market-wordpress-plugin-for-theme-updates/' target='_blank'>" . esc_html__( "documentation", 'movedo' ) . "</a>.";

			$message .=  '<br/><span><a href="' .esc_url( wp_nonce_url( add_query_arg( 'movedo-grve-dismiss', 'dismiss_envato_market_notice' ), 'movedo-grve-dismiss-' . esc_attr( get_current_user_id() ) ) ) . '" class="dismiss-notice" target="_parent">' . esc_html__( "Dismiss this notice", 'movedo' ) . '</a><span>';

			add_settings_error(
				'grve-envato-market-message',
				'plugins_update_required',
				$message,
				'updated'
			);
			if ( 'options-general' !== $GLOBALS['current_screen']->parent_base ) {
				settings_errors( 'grve-envato-market-message' );
			}

		}

	}

}
add_action( 'admin_notices', 'movedo_grve_admin_notices' );

/**
 * Dismiss notices and update user meta data
 */
function movedo_grve_notice_dismiss() {
	if ( isset( $_GET['movedo-grve-dismiss'] ) && check_admin_referer( 'movedo-grve-dismiss-' . get_current_user_id() ) ) {
		$dismiss = $_GET['movedo-grve-dismiss'];
		if ( 'dismiss_envato_market_notice' == $dismiss ) {
			update_user_meta( get_current_user_id(), 'movedo_grve_dismissed_notice_envato_market' , 1 );
		} else if ( 'dismiss_update_plugins_notice' == $dismiss ) {
			update_user_meta( get_current_user_id(), 'movedo_grve_dismissed_notice_update_plugins' , 1 );
		}
	}
}
add_action( 'admin_head', 'movedo_grve_notice_dismiss' );

/**
 * Delete metadata for admin notices when switching themes
 */
function movedo_grve_update_dismiss() {
	delete_metadata( 'user', null, 'movedo_grve_dismissed_notice_envato_market', null, true );
	delete_metadata( 'user', null, 'movedo_grve_dismissed_notice_update_plugins', null, true );
}
add_action( 'switch_theme', 'movedo_grve_update_dismiss' );

function movedo_grve_update_external_plugins_version( $plugins ) {

	$json_transient_key = 'movedo_grve_external_plugins_version';
	$json_data = get_transient($json_transient_key);

	if (!$json_data) {
		// If transient is not available, fetch the JSON data
		$json_file_url = 'https://greativesweb.github.io/repository/plugins/version.json';
		$response = wp_remote_get($json_file_url);

		if ( !is_wp_error($response) && $response['response']['code'] === 200 ) {
			$json_data = $response['body'];

			// Cache the JSON data for an hour (adjust the expiration time as needed)
			set_transient($json_transient_key, $json_data, DAY_IN_SECONDS);
		}
	}

	if ($json_data) {
		$json_data_decoded = json_decode($json_data, true);

		// Get the plugins array
		$plugins_data = isset($json_data_decoded['plugins']) ? $json_data_decoded['plugins'] : array();

		foreach ($plugins as &$plugin) {

			$slug = isset($plugin['slug']) ? $plugin['slug'] : '';
            $source = isset($plugin['source']) ? $plugin['source'] : '';

			// Skip bundled and repository plugins
			if (!$slug || !$source || !preg_match('|^http[s]?://|', $source)) {
				continue;
			}
			// Check if the plugin is in the JSON file and has a higher version
			if ($slug && isset($plugins_data[$slug]) && version_compare($plugins_data[$slug], $plugin['version'], '>')) {
				// Update the version in the $plugins array
				$plugin['version'] = $plugins_data[$slug];
			}
		}
	}

	return $plugins;

}
add_filter( 'movedo_grve_recommended_plugins', 'movedo_grve_update_external_plugins_version' );


//Omit closing PHP tag to avoid accidental whitespace output errors.
