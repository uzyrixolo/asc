<?php
/*
*	Admin Custom Sidebars
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

	function movedo_grve_add_sidebar_settings() {

		if ( isset( $_POST['_movedo_grve_nonce_sidebar_save'] ) && wp_verify_nonce( $_POST['_movedo_grve_nonce_sidebar_save'], 'movedo_grve_nonce_sidebar_save' ) ) {

			$sidebars_items = array();
			if( isset( $_POST['_movedo_grve_custom_sidebar_item_id'] ) ) {
				$num_of_sidebars = sizeof( $_POST['_movedo_grve_custom_sidebar_item_id'] );
				for ( $i=0; $i < $num_of_sidebars; $i++ ) {
					$this_sidebar = array (
						'id' => sanitize_text_field( $_POST['_movedo_grve_custom_sidebar_item_id'][ $i ] ),
						'name' => sanitize_text_field( $_POST['_movedo_grve_custom_sidebar_item_name'][ $i ] ),
					);
					array_push( $sidebars_items, $this_sidebar );
				}
			}
			if ( empty( $sidebars_items ) ) {
				delete_option( '_movedo_grve_custom_sidebars' );
			} else {
				update_option( '_movedo_grve_custom_sidebars', $sidebars_items );
			}
			//Update Sidebar list
			wp_get_sidebars_widgets();
			wp_safe_redirect( 'admin.php?page=movedo-sidebars&sidebar-settings=saved' );

		}
	}

	add_action( 'admin_menu', 'movedo_grve_add_sidebar_settings' );


	function  movedo_grve_print_admin_custom_sidebars( $movedo_grve_custom_sidebars ) {

		movedo_grve_print_admin_empty_custom_sidebar();
		if ( ! empty( $movedo_grve_custom_sidebars ) ) {
			foreach ( $movedo_grve_custom_sidebars as $movedo_grve_custom_sidebar ) {
				movedo_grve_print_admin_single_custom_sidebar( $movedo_grve_custom_sidebar );
			}
		}
	}

	function  movedo_grve_print_admin_empty_custom_sidebar() {
?>
		<tr class="grve-custom-sidebar-item grve-custom-sidebar-empty">
			<td>&nbsp;</td>
			<td>
				<h4 class="grve-custom-sidebar-title">
					<span><?php esc_html_e('No Sidebars added yet!', 'movedo' ); ?></span>
				</h4>
			</td>
		</tr>
<?php
	}
	function  movedo_grve_print_admin_single_custom_sidebar( $sidebar_item, $mode = '' ) {

		$movedo_grve_button_class = "grve-custom-sidebar-item-delete-button";
		$sidebar_item_id = uniqid('movedo_grve_sidebar_');

		if( $mode = "new" ) {
			$movedo_grve_button_class = "grve-custom-sidebar-item-delete-button grve-item-new";
		}
?>

	<tr class="grve-custom-sidebar-item grve-custom-sidebar-normal">
		<td>
			<input class="<?php echo esc_attr( $movedo_grve_button_class ); ?> button" type="button" value="<?php esc_attr_e('Delete', 'movedo' ); ?>">
		</td>
		<td>
			<h4 class="grve-custom-sidebar-title">
				<span><?php esc_html_e('Custom Sidebar', 'movedo' ); ?>: <?php echo movedo_grve_array_value( $sidebar_item, 'name' ); ?></span>
			</h4>
			<div class="grve-custom-sidebar-settings">
				<input type="hidden" name="_movedo_grve_custom_sidebar_item_id[]" value="<?php echo movedo_grve_array_value( $sidebar_item, 'id', $sidebar_item_id ); ?>">
				<input type="hidden" class="grve-custom-sidebar-item-name" name="_movedo_grve_custom_sidebar_item_name[]" value="<?php echo movedo_grve_array_value( $sidebar_item, 'name' ); ?>"/>
			</div>
		</td>
	</tr>

<?php

	}

	add_action( 'wp_ajax_movedo_grve_get_custom_sidebar', 'movedo_grve_get_custom_sidebar' );

	function movedo_grve_get_custom_sidebar() {

		check_ajax_referer( 'movedo-grve-get-custom-sidebar', '_grve_nonce' );

		if( isset( $_POST['sidebar_name'] ) ) {

			$sidebar_item_name = sanitize_text_field( $_POST['sidebar_name'] );
			$sidebar_item_id = uniqid('movedo_grve_sidebar_');
			if( empty( $sidebar_item_name ) ) {
				$sidebar_item_name = $sidebar_item_id;
			}

			$this_sidebar = array (
				'id' => $sidebar_item_id,
				'name' => $sidebar_item_name,
			);

			movedo_grve_print_admin_single_custom_sidebar( $this_sidebar, 'new' );
		}
		die();

	}

//Omit closing PHP tag to avoid accidental whitespace output errors.
