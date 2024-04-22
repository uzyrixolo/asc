<?php
/*
*	Admin Page Status
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function movedo_grve_check_php_val( $size, $min_size, $error_text = '' ) {
	if ( wp_convert_hr_to_bytes( $size ) < wp_convert_hr_to_bytes( $min_size ) ) {
		$link = '<a class="grve-docs-link" href="//docs.greatives.eu/tutorials/recommended-server-settings-memory-issues" title="' . esc_attr__( 'Visit Documentation', 'movedo' ) . '" target="_blank" rel="noopener noreferrer">' . esc_html__( 'How to Fix', 'movedo' ) . '</a>';
		return movedo_grve_get_status_error_val ( $size, true, $error_text, $link );
	} else {
		return movedo_grve_get_status_error_val ( $size, false );
	}
}

function movedo_grve_get_php_version_val() {
	if ( version_compare( phpversion(), '5.6', '<' ) ) {
		return movedo_grve_get_status_error_val ( phpversion(), true, esc_html__( '(recommended PHP 5.6 or higher)', 'movedo' ) );
	} else {
		return movedo_grve_get_status_error_val ( phpversion(), false );
	}
}

function movedo_grve_get_status_error_val( $val, $error, $error_text = '', $link = '' ) {
	if ( $error ) {
		$ret = '<mark class="error">' . $val . ' ' . $error_text . '</mark> ' . wp_kses_post( $link ); 
	} else {
		$ret = '<mark class="yes">' . $val . '</mark>';  
	}
	return $ret;
}

function movedo_grve_status_bool_to_text( $val ) {

	if ( !$val ) {
		 $ret = '-';
	} else {
		 $ret = '<mark class="yes"><i class="dashicons dashicons-yes"></i></mark>';
	}
	return $ret;
}

function movedo_grve_status_get_theme_data() {


	$theme = wp_get_theme();

	if ( is_child_theme() ) {
		$parent_theme = wp_get_theme( $theme->template );

		$theme_info = '';
		$theme_value = $parent_theme->name . '(' . $parent_theme->version . ')';
		$child_theme_info = '';
		$child_theme_value = $theme->name . ' v' . $theme->version;
	} else {
		$theme_info = '';
		$theme_value = $theme->name . ' v' . $theme->version;
		$child_theme_info = '';
		$child_theme_value = '-';
	}

	$data = array(
		array(
			'id' => 'theme',
			'title' => esc_html__( 'Theme', 'movedo' ),
			'info' => $theme_info,
			'value' => $theme_value,
		),
		array(
			'id' => 'child_theme',
			'title' => esc_html__( 'Child Theme', 'movedo' ),
			'info' => $child_theme_info,
			'value' => $child_theme_value,
		),
	);
	return $data;
}

function movedo_grve_status_get_environment_data() {

	$data = array(
		array(
			'id'   => 'home_url',
			'title' => esc_html__( 'Home URL', 'movedo' ),
			'info' => '',
			'value'  => home_url(),
		),
		array(
			'id'   => 'site_url',
			'title' => esc_html__( 'Site URL', 'movedo' ),
			'info' => '',
			'value'  => get_option( 'siteurl' ),
		),
		array(
			'id'   => 'wp_version',
			'title' => esc_html__( 'WP Version', 'movedo' ),
			'info' => '',
			'value'  => get_bloginfo( 'version' ),
		),
		array(
			'id'   => 'wp_memory_limit',
			'title' => esc_html__( 'WP Memory Limit', 'movedo' ),
			'info' => '',
			'value'  => movedo_grve_check_php_val( WP_MEMORY_LIMIT, '96M', esc_html__( '( recommended: 96M )', 'movedo' ) ),
		),
		array(
			'id'   => 'wp_multisite',
			'title' => esc_html__( 'WP Multisite', 'movedo' ),
			'info' => '',
			'value'  => movedo_grve_status_bool_to_text( is_multisite() ),
		),
		array(
			'id'   => 'wp_debug',
			'title' => esc_html__( 'WP Debug Mode', 'movedo' ),
			'info' => '',
			'value'  => movedo_grve_status_bool_to_text( defined( 'WP_DEBUG' ) && WP_DEBUG ),
		),
		array(
			'id'   => 'wp_language',
			'title' => esc_html__( 'Language', 'movedo' ),
			'info' => '',
			'value'  => get_locale(),
		),
	);

	return $data;

}

function movedo_grve_status_get_server_data() {

	$gd_val = '-';
	if ( extension_loaded( 'gd' ) && function_exists( 'gd_info' ) ) {
		$gd_val = '<mark class="yes"><i class="dashicons dashicons-yes"></i></mark>';
		$gd_info = gd_info();
		if ( isset( $gd_info['GD Version'] ) ) {
			$gd_val = $gd_info['GD Version'];
		}
	}

	$data = array(
		array(
			'id'   => 'php_version',
			'title' => esc_html__( 'PHP version', 'movedo' ),
			'info' => '',
			'value'  => movedo_grve_get_php_version_val(),
		),
		array(
			'id'   => 'memory_limit',
			'title' => esc_html__( 'PHP Memory Limit', 'movedo' ) . ' (memory_limit)',
			'info' => '',
			'value'  => movedo_grve_check_php_val( ini_get( 'memory_limit' ), '256M', esc_html__( '( min: 256M )', 'movedo' ) ),
		),
		array(
			'id'   => 'post_max_size',
			'title' => esc_html__( 'PHP Max. Post Size', 'movedo' ) . ' (post_max_size)',
			'info' => '',
			'value'  => movedo_grve_check_php_val( ini_get( 'post_max_size' ), '128M', esc_html__( '( min: 128M )', 'movedo' ) ),
		),
		array(
			'id'   => 'upload_max_filesize',
			'title' => esc_html__( 'PHP Upload Max. Filesize', 'movedo' ) . ' (upload_max_filesize)',
			'info' => '',
			'value'  => movedo_grve_check_php_val( ini_get( 'upload_max_filesize' ), '32M', esc_html__( '( recommended:32M )', 'movedo' ) ),
		),
		array(
			'id'   => 'max_execution_time',
			'title' => esc_html__( 'PHP max_execution_time', 'movedo' ) . ' (max_execution_time)',
			'info' => '',
			'value'  => movedo_grve_check_php_val( ini_get( 'max_execution_time' ), '300', esc_html__( '( min: 300 )', 'movedo' ) ),
		),
		array(
			'id'   => 'max_input_vars',
			'title' => esc_html__( 'PHP Max. Input Variables', 'movedo' ) . ' (max_input_vars)',
			'info' => '',
			'value'  => movedo_grve_check_php_val( ini_get( 'max_input_vars' ), '3000', esc_html__( '( min: 3000 )', 'movedo' ) ),
		),
		array(
			'id'   => 'domdocument_enabled',
			'title' => esc_html__( 'DOMDocument', 'movedo' ),
			'info' => '',
			'value'  => movedo_grve_status_bool_to_text( class_exists( 'DOMDocument' ) ),
		),
		array(
			'id'   => 'gzip_enabled',
			'title' => esc_html__( 'GZip', 'movedo' ),
			'info' => '',
			'value'  => movedo_grve_status_bool_to_text( is_callable( 'gzopen' ) ),
		),
		array(
			'id'   => 'gd_library',
			'title' => esc_html__( 'GD Library', 'movedo' ),
			'info' => '',
			'value'  => $gd_val,
		),
	);

	return $data;

}


function movedo_grve_status_get_plugins_data() {
	$active_plugins = (array) get_option( 'active_plugins', array() );
	if ( is_multisite() ) {
		$active_plugins = array_merge( $active_plugins, array_keys( get_site_option( 'active_sitewide_plugins', array() ) ) );
	}
	$data = array();


	foreach ( $active_plugins as $plugin ) {

		$plugin_data    = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );

		if ( ! empty( $plugin_data['Name'] ) ) {
			if ( ! empty( $plugin_data['PluginURI'] ) ) {
				$plugin_name = '<a href="' . esc_url( $plugin_data['PluginURI'] ) . '" title="' . esc_attr__( 'Visit plugin homepage', 'movedo' ) . '">' . esc_html( $plugin_data['Name'] ) . '</a>';
			} else {
				$plugin_name = esc_html( $plugin_data['Name'] );
			}

			$data[] = array(
				'title' => $plugin_name,
				'info' => '',
				'value' => 'v' . esc_html( $plugin_data['Version'] ) . ' &ndash; ' . esc_attr__( 'by', 'movedo' ) . ' ' . '<a href="' . esc_url( $plugin_data['AuthorURI'] ) . '" target="_blank" rel="noopener noreferrer">' . esc_html( $plugin_data['AuthorName'] ) . '</a>',
			);
		}
	}

	return $data;

}

?>
	<div id="grve-status-wrap" class="wrap">
		<h2><?php esc_html_e( "Status", 'movedo' ); ?></h2>
		<?php movedo_grve_print_admin_links('status'); ?>

		<div class="updated grve-debug-report-wrap inline">
			<p>
				<a href="#" class="button-primary grve-debug-report"><?php esc_html_e( 'Get system report', 'movedo' ); ?></a>
				<span class="grve-debug-report-msg"><?php esc_html_e( 'Click the button to produce a report, then copy and paste this information in your ticket when contacting support.', 'movedo' ); ?></span>
			</p>
			<div id="grve-debug-report">
				<textarea id="grve-debug-textarea" readonly="readonly"></textarea>
				<p class="submit">
					<button id="grve-copy-for-support" class="button-primary" href="#" data-tip="<?php esc_attr_e( 'Copied!', 'movedo' ); ?>">
						<?php esc_html_e( 'Copy for support', 'movedo' ); ?>
					</button>
				</p>
				<p class="copy-error hidden">
					<?php esc_html_e( 'Copying to clipboard failed. Please press Ctrl/Cmd+C to copy.', 'movedo' ); ?>
				</p>
			</div>
		</div>

<?php
		$status_theme_data = movedo_grve_status_get_theme_data();
		if ( !empty( $status_theme_data ) ) {
?>
		<table class="grve-status-table widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="3"><h2><?php esc_html_e( 'Theme', 'movedo' ); ?></h2></th>
				</tr>
			</thead>
			<tbody>
<?php
			foreach ( $status_theme_data as $theme_data => $data ) {
?>
				<tr>
					<td><?php echo wp_kses_post( $data['title']  ); ?></td>
					<td class="help"><?php echo wp_kses_post( $data['info'] ); ?></td>
					<td><?php echo wp_kses_post( $data['value'] ); ?></td>
				</tr>
<?php
			}
?>
			</tbody>
		</table>
<?php
		}

		$status_environment_data = movedo_grve_status_get_environment_data();
		if ( !empty( $status_environment_data ) ) {
?>
		<table class="grve-status-table widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="3"><h2><?php esc_html_e( 'WordPress Environment', 'movedo' ); ?></h2></th>
				</tr>
			</thead>
			<tbody>
<?php
			foreach ( $status_environment_data as $theme_data => $data ) {
?>
				<tr>
					<td><?php echo wp_kses_post( $data['title']  ); ?></td>
					<td class="help"><?php echo wp_kses_post( $data['info'] ); ?></td>
					<td><?php echo wp_kses_post( $data['value'] ); ?></td>
				</tr>
<?php
			}
?>
			</tbody>
		</table>
<?php
		}

		$status_server_data = movedo_grve_status_get_server_data();
		if ( !empty( $status_server_data ) ) {
?>
		<table class="grve-status-table widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="3"><h2><?php esc_html_e( 'Server Environment', 'movedo' ); ?></h2></th>
				</tr>
			</thead>
			<tbody>
<?php
			foreach ( $status_server_data as $theme_data => $data ) {
?>
				<tr>
					<td><?php echo wp_kses_post( $data['title']  ); ?></td>
					<td class="help"><?php echo wp_kses_post( $data['info'] ); ?></td>
					<td><?php echo wp_kses_post( $data['value'] ); ?></td>
				</tr>
<?php
			}
?>
			</tbody>
		</table>
<?php
		}
		$status_plugins_data = movedo_grve_status_get_plugins_data();
		if ( !empty( $status_plugins_data ) ) {
			$status_plugins_count = count( $status_plugins_data );
?>
		<table class="grve-status-table widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="3"><h2><?php esc_html_e( 'Active Plugins', 'movedo' ); ?> (<?php echo esc_html( $status_plugins_count ); ?>)</h2></th>
				</tr>
			</thead>
			<tbody>
<?php
			foreach ( $status_plugins_data as $theme_data => $data ) {
?>
				<tr>
					<td><?php echo wp_kses_post( $data['title']  ); ?></td>
					<td class="help"><?php echo wp_kses_post( $data['info'] ); ?></td>
					<td><?php echo wp_kses_post( $data['value'] ); ?></td>
				</tr>
<?php
			}
?>
			</tbody>
		</table>
<?php
		}
?>
	</div>
<?php

//Omit closing PHP tag to avoid accidental whitespace output errors.
