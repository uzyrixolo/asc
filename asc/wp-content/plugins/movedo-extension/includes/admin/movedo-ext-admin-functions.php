<?php
/*
*	Admin Functions
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function movedo_ext_admin_menu(){
	if ( current_user_can( 'edit_theme_options' ) ) {
		if ( function_exists( 'movedo_grve_info') ) {
			add_submenu_page( 'movedo', esc_html__('Custom Codes','movedo-extension'), esc_html__('Custom Codes','movedo-extension'), 'edit_theme_options', 'movedo-codes', 'movedo_ext_admin_page_html_codes' );
		} else {
			add_menu_page( 'Movedo', 'Movedo', 'edit_theme_options', 'movedo', 'movedo_ext_admin_page_html_codes', MOVEDO_EXT_PLUGIN_DIR_URL .'assets/images/adminmenu/theme.png', 4 );
			add_submenu_page( 'movedo', esc_html__('Custom Codes','movedo-extension'), esc_html__('Custom Codes','movedo-extension'), 'edit_theme_options', 'movedo-codes', 'movedo_ext_admin_page_html_codes' );
		}
	}
}
add_action( 'admin_menu', 'movedo_ext_admin_menu', 11 );


function movedo_ext_admin_page_html_codes(){
	require_once MOVEDO_EXT_PLUGIN_DIR_PATH . 'includes/admin/movedo-ext-admin-page-codes.php';
}

function movedo_ext_admin_links( $active_tab = 'status' ){
?>
	<a href="?page=movedo-codes" class="nav-tab <?php echo 'codes' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Custom Codes','movedo-extension'); ?></a>
<?php
}
add_action( 'movedo_grve_admin_links', 'movedo_ext_admin_links' );

function movedo_ext_add_settings() {

	if ( isset( $_POST['_movedo_ext_options_nonce_save'] ) && wp_verify_nonce( $_POST['_movedo_ext_options_nonce_save'], 'movedo_ext_options_nonce_save' ) ) {

		if ( isset( $_POST['movedo_grve_ext_options'] ) ) {
			$options = get_option('movedo_grve_ext_options');

			$keys = array_keys( $_POST['movedo_grve_ext_options'] );
			foreach ( $keys as $key ) {
				if ( isset( $_POST['movedo_grve_ext_options'][$key] ) ) {
					$options[$key] = $_POST['movedo_grve_ext_options'][$key];
				}
			}
			if ( empty( $options ) ) {
				delete_option( 'movedo_grve_ext_options' );
			} else {
				update_option( 'movedo_grve_ext_options', $options );
			}
		}
		wp_safe_redirect( 'admin.php?page=movedo-codes&ext-settings=saved' );
	}
}
add_action( 'admin_menu', 'movedo_ext_add_settings' );



if ( !function_exists('movedo_ext_print_head_code') ) {
	function movedo_ext_print_head_code() {
		$options = get_option('movedo_grve_ext_options');
		$code = movedo_ext_vce_array_value( $options, 'head_code' );
		if ( !empty( $code ) ) {
			echo wp_unslash( $code );
		}
	}
}
add_action('wp_head', 'movedo_ext_print_head_code');

if ( !function_exists('movedo_ext_print_body_code') ) {
	function movedo_ext_print_body_code() {
		$options = get_option('movedo_grve_ext_options');
		$code = movedo_ext_vce_array_value( $options, 'body_code' );
		if ( !empty( $code ) ) {
			echo wp_unslash( $code );
		}
	}
}
add_action('movedo_grve_body_top', 'movedo_ext_print_body_code');

if ( !function_exists('movedo_ext_print_footer_code') ) {
	function movedo_ext_print_footer_code() {
		$options = get_option('movedo_grve_ext_options');
		$code = movedo_ext_vce_array_value( $options, 'footer_code' );
		if ( !empty( $code ) ) {
			echo wp_unslash( $code );
		}
	}
}
add_action('wp_footer', 'movedo_ext_print_footer_code');

//Omit closing PHP tag to avoid accidental whitespace output errors.
