<?php

/*
*	Admin screen functions
*
* 	@version	1.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

function movedo_grve_admin_menu(){
	if ( current_user_can( 'edit_theme_options' ) ) {
		add_menu_page( 'Movedo', 'Movedo', 'edit_theme_options', 'movedo', 'movedo_grve_admin_page_welcome', get_template_directory_uri() .'/includes/images/adminmenu/theme.png', 4 );
		add_submenu_page( 'movedo', esc_html__('Welcome','movedo'), esc_html__('Welcome','movedo'), 'edit_theme_options', 'movedo', 'movedo_grve_admin_page_welcome' );
		add_submenu_page( 'movedo', esc_html__('Status','movedo'), esc_html__('Status','movedo'), 'edit_theme_options', 'movedo-status', 'movedo_grve_admin_page_status' );
		add_submenu_page( 'movedo', esc_html__( 'Custom Sidebars', 'movedo' ), esc_html__( 'Custom Sidebars', 'movedo' ), 'edit_theme_options','movedo-sidebars','movedo_grve_admin_page_sidebars');
	}	add_submenu_page( 'movedo', esc_html__( 'Import Demos', 'movedo' ), esc_html__( 'Import Demos', 'movedo' ), 'edit_theme_options','movedo-import','movedo_grve_admin_page_import');
}

add_action( 'admin_menu', 'movedo_grve_admin_menu' );


function movedo_grve_tgmpa_plugins_links(){
	movedo_grve_print_admin_links('plugins');
}
add_action( 'movedo_grve_before_tgmpa_plugins', 'movedo_grve_tgmpa_plugins_links' );

function movedo_grve_admin_page_welcome(){
	require_once get_template_directory() . '/includes/admin/pages/grve-admin-page-welcome.php';
}
function movedo_grve_admin_page_status(){
	require_once get_template_directory() . '/includes/admin/pages/grve-admin-page-status.php';
}
function movedo_grve_admin_page_sidebars(){
	require_once get_template_directory() . '/includes/admin/pages/grve-admin-page-sidebars.php';
}
function movedo_grve_admin_page_import(){
	require_once get_template_directory() . '/includes/admin/pages/grve-admin-page-import.php';
}

function movedo_grve_print_admin_links( $active_tab = 'status' ) {
?>
<h2 class="nav-tab-wrapper">
	<a href="?page=movedo" class="nav-tab <?php echo 'welcome' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Welcome','movedo'); ?></a>
	<a href="?page=movedo-status" class="nav-tab <?php echo 'status' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Status','movedo'); ?></a>
	<a href="?page=movedo-sidebars" class="nav-tab <?php echo 'sidebars' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Custom Sidebars','movedo'); ?></a>
	<a href="?page=movedo-import" class="nav-tab <?php echo 'import' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Import Demos','movedo'); ?></a>
	<a href="?page=movedo-tgmpa-install-plugins" class="nav-tab <?php echo 'plugins' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Theme Plugins','movedo'); ?></a>
	<?php do_action( 'movedo_grve_admin_links', $active_tab ); ?>
</h2>
<?php
}

//Omit closing PHP tag to avoid accidental whitespace output errors.