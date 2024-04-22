<?php
/*
*	Greatives Testimonial Items
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

	add_action( 'save_post', 'movedo_grve_testimonial_options_save_postdata', 10, 2 );

	$movedo_grve_testimonial_options = array (
		array(
			'name' => 'Name',
			'id' => '_movedo_grve_testimonial_name',
		),
		array(
			'name' => 'Identity',
			'id' => '_movedo_grve_testimonial_identity',
		),
	);

	function movedo_grve_testimonial_options_box( $post ) {

		wp_nonce_field( 'movedo_grve_nonce_testimonial_save', '_movedo_grve_nonce_testimonial_save' );

		$movedo_grve_testimonial_name = get_post_meta( $post->ID, '_movedo_grve_testimonial_name', true );
		$movedo_grve_testimonial_identity = get_post_meta( $post->ID, '_movedo_grve_testimonial_identity', true );

	?>
		<table class="form-table grve-metabox">
			<tbody>
				<tr class="grve-border-bottom">
					<th>
						<label for="grve-testimonial-name">
							<strong><?php esc_html_e( 'Name', 'movedo' ); ?></strong>
							<span>
								<?php esc_html_e( 'Type the name.', 'movedo' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="grve-testimonial-name" class="grve-meta-text" name="_movedo_grve_testimonial_name" value="<?php echo esc_attr( $movedo_grve_testimonial_name ); ?>"/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="grve-testimonial-identity">
							<strong><?php esc_html_e( 'Identity', 'movedo' ); ?></strong>
							<span>
								<?php esc_html_e( 'Type the identity', 'movedo' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="grve-testimonial-identity" class="grve-meta-text" name="_movedo_grve_testimonial_identity" value="<?php echo esc_attr( $movedo_grve_testimonial_identity ); ?>"/>
					</td>
				</tr>
			</tbody>
		</table>


	<?php
	}


	function movedo_grve_testimonial_options_save_postdata( $post_id , $post ) {
		global $movedo_grve_testimonial_options;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
			return $post_id;
		}

		if ( ! isset( $_POST['_movedo_grve_nonce_testimonial_save'] ) || !wp_verify_nonce( $_POST['_movedo_grve_nonce_testimonial_save'], 'movedo_grve_nonce_testimonial_save' ) ) {
			return;
		}

		// Check permissions
		if ( 'testimonial' == $_POST['post_type'] )
		{
			if ( !current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		}

		foreach ( $movedo_grve_testimonial_options as $value ) {
			$allow_html = ( isset( $value['html'] ) ? $value['html'] : false );
			if( $allow_html ) {
				$new_meta_value = ( isset( $_POST[$value['id']] ) ? wp_filter_post_kses( $_POST[$value['id']] ) : '' );
			} else {
				$new_meta_value = ( isset( $_POST[$value['id']] ) ? sanitize_text_field( $_POST[$value['id']] ) : '' );
			}
			$meta_key = $value['id'];


			$meta_value = get_post_meta( $post_id, $meta_key, true );

			if ( '' != $new_meta_value  && '' == $meta_value ) {
				if ( !add_post_meta( $post_id, $meta_key, $new_meta_value, true ) ) {
					update_post_meta( $post_id, $meta_key, $new_meta_value );
				}
			} elseif ( '' != $new_meta_value && $new_meta_value != $meta_value ) {
				update_post_meta( $post_id, $meta_key, $new_meta_value );
			} elseif ( '' == $new_meta_value && '' != $meta_value ) {
				delete_post_meta( $post_id, $meta_key );
			}
		}

	}

//Omit closing PHP tag to avoid accidental whitespace output errors.
