<?php
/**
 * Greatives Social Networking
 * A widget that displays social networking links.
 * @author		Greatives Team
 * @URI			http://greatives.eu
 */

if ( ! class_exists( 'Movedo_Ext_Widget_Social' ) ) {
	class Movedo_Ext_Widget_Social extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname' => 'grve-widget grve-element grve-social',
				'description' => esc_html__( 'A widget that displays social networking links', 'movedo-extension' ),
			);
			$control_ops = array(
				'width' => 400,
				'height' => 600,
				'id_base' => 'grve-widget-social',
			);
			parent::__construct( 'grve-widget-social', '(Greatives) ' . esc_html__( 'Social Networking', 'movedo-extension' ), $widget_ops, $control_ops );
		}

		function movedo_ext_widget_social() {
			$this->__construct();
		}

		function widget( $args, $instance ) {

			global $movedo_grve_social_list_extended;

			//Our variables from the widget settings.
			extract( $args );

			echo $before_widget; // XSS OK

			// Display the widget title
			$title = movedo_ext_vce_array_value( $instance, 'title' );
			$title = apply_filters( 'widget_title', $title );
			if ( $title ) {
				echo $before_title . esc_html( $title ) . $after_title; // XSS OK
			}

			$icon_size = movedo_ext_vce_array_value( $instance, 'icon_size', 'extrasmall' );
			$icon_shape = movedo_ext_vce_array_value( $instance, 'shape', 'square' );
			$shape_type = movedo_ext_vce_array_value( $instance, 'shape_type', 'outline' );

			$icon_color = movedo_ext_vce_array_value( $instance, 'icon_color', 'primary-1' );
			$shape_color = movedo_ext_vce_array_value( $instance, 'shape_color', 'black' );


			$social_shape_classes = array();
			$social_shape_classes[] = 'grve-' . $icon_size;
			$social_shape_classes[] = 'grve-' . $icon_shape;

			if ( 'no-shape' != $icon_shape ) {
				$social_shape_classes[] = 'grve-with-shape';
				$social_shape_classes[] = 'grve-' . $shape_type;
				if ( 'outline' != $shape_type ) {
					$social_shape_classes[] = 'grve-bg-' . $shape_color;
				} else {
					$social_shape_classes[] = 'grve-text-' . $shape_color;
					$social_shape_classes[] = 'grve-text-hover-' . $shape_color;
				}
			}

			$social_shape_class_string = implode( ' ', $social_shape_classes );

		?>

			<ul>
			<?php
			if ( isset( $movedo_grve_social_list_extended ) ) {
				foreach ( $movedo_grve_social_list_extended as $social_item ) {

					$social_item_url = movedo_ext_vce_array_value( $instance, $social_item['url'] );
					$social_rel = movedo_ext_social_rel();

					if ( ! empty( $social_item_url ) ) {

						if ( 'skype' == $social_item['id'] ) {
				?>
							<li>
								<a href="<?php echo esc_url( $social_item_url, array( 'skype', 'http', 'https' ) ); ?>" class="<?php echo esc_attr( $social_shape_class_string ); ?>" aria-label="<?php echo esc_attr( $social_item['title'] ); ?>">
									<i class="grve-text-<?php echo esc_attr( $icon_color ); ?> <?php echo esc_attr( $social_item['class'] ); ?>"></i>
								</a>
							</li>
				<?php
						} else {
				?>
							<li>
								<a href="<?php echo esc_url( $social_item_url ); ?>" class="<?php echo esc_attr( $social_shape_class_string ); ?>" aria-label="<?php echo esc_attr( $social_item['title'] ); ?>" target="_blank" rel="<?php echo implode( ' ', $social_rel ); ?>">
									<i class="grve-text-<?php echo esc_attr( $icon_color ); ?> <?php echo esc_attr( $social_item['class'] ); ?>"></i>
								</a>
							</li>
				<?php
						}
					}
				}
			}
			?>
			</ul>


		<?php

			echo $after_widget; // XSS OK
		}

		//Update the widget

		function update( $new_instance, $old_instance ) {

			global $movedo_grve_social_list_extended;
			$instance = $old_instance;

			//Strip tags from title to remove HTML
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['icon_size'] = strip_tags( $new_instance['icon_size'] );
			$instance['icon_color'] = strip_tags( $new_instance['icon_color'] );
			$instance['shape'] = strip_tags( $new_instance['shape'] );
			$instance['shape_type'] = strip_tags( $new_instance['shape_type'] );
			$instance['shape_color'] = strip_tags( $new_instance['shape_color'] );

			if ( isset( $movedo_grve_social_list_extended ) ) {
				foreach ( $movedo_grve_social_list_extended as $social_item ) {
					$instance[ $social_item['url'] ] = strip_tags( $new_instance[ $social_item['url'] ] );
				}
			}


			return $instance;
		}

		function form( $instance ) {

			global $movedo_grve_social_list_extended;

			//Set up some default widget settings.
			$defaults = array(
				'title' => '',
				'icon_size' => 'extrasmall',
				'icon_color' => 'primary-1',
				'shape' => 'square',
				'shape_type' => 'outline',
				'shape_color' => 'black',
			);

			$instance = wp_parse_args( (array) $instance, $defaults );

			$icon_size = movedo_ext_vce_array_value( $instance, 'icon_size');
			$icon_shape = movedo_ext_vce_array_value( $instance, 'shape');
			$icon_shape_type = movedo_ext_vce_array_value( $instance, 'shape_type');
			$icon_color = movedo_ext_vce_array_value( $instance, 'icon_color' );
			$shape_color = movedo_ext_vce_array_value( $instance, 'shape_color' );

			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'movedo-extension' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'icon_size' ) ); ?>"><?php echo esc_html__( 'Icon Size:', 'movedo-extension' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'icon_size' ) ); ?>" style="width:100%;">
				<?php
					movedo_ext_print_select_options(
						array(
							'large' => __( 'Large', 'movedo-extension' ),
							'medium' => __( 'Medium', 'movedo-extension' ),
							'small' => __( 'Small', 'movedo-extension' ),
							'extrasmall' => __( 'Extra Small', 'movedo-extension' ),
						),
						$icon_size
					);
				?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>"><?php echo esc_html__( 'Icon Color:', 'movedo-extension' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'icon_color' ) ); ?>" style="width:100%;">
				<?php
					movedo_ext_print_select_options(
						array(
							'primary-1' => __( 'Primary 1', 'movedo-extension' ),
							'primary-2' => __( 'Primary 2', 'movedo-extension' ),
							'primary-3' => __( 'Primary 3', 'movedo-extension' ),
							'primary-4' => __( 'Primary 4', 'movedo-extension' ),
							'primary-5' => __( 'Primary 5', 'movedo-extension' ),
							'primary-6' => __( 'Primary 6', 'movedo-extension' ),
							'green' => __( 'Green', 'movedo-extension' ),
							'orange' => __( 'Orange', 'movedo-extension' ),
							'red' => __( 'Red', 'movedo-extension' ),
							'blue' => __( 'Blue', 'movedo-extension' ),
							'aqua' => __( 'Aqua', 'movedo-extension' ),
							'purple' => __( 'Purple', 'movedo-extension' ),
							'black' => __( 'Black', 'movedo-extension' ),
							'grey' => __( 'Grey', 'movedo-extension' ),
							'white' => __( 'White', 'movedo-extension' ),
						),
						$icon_color
					);
				?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'shape' ) ); ?>"><?php echo esc_html__( 'Shape:', 'movedo-extension' ); ?></label>
				<select  name="<?php echo esc_attr( $this->get_field_name( 'shape' ) ); ?>" style="width:100%;">
				<?php
					movedo_ext_print_select_options(
						array(
							'square' => __( 'Square', 'movedo-extension'  ),
							'round' => __( 'Round', 'movedo-extension' ),
							'circle' => __( 'Circle', 'movedo-extension' ),
							'no-shape' => __( 'None', 'movedo-extension' ),
						),
						$icon_shape
					);
				?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'shape_type' ) ); ?>"><?php echo esc_html__( 'Shape Type:', 'movedo-extension' ); ?></label>
				<select  name="<?php echo esc_attr( $this->get_field_name( 'shape_type' ) ); ?>" style="width:100%;">
				<?php
					movedo_ext_print_select_options(
						array(
							'simple' => __( 'Simple', 'movedo-extension' ),
							'outline' => __( 'Outline', 'movedo-extension' ),
						),
						$icon_shape_type
					);
				?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'shape_color' ) ); ?>"><?php echo esc_html__( 'Shape Color:', 'movedo-extension' ); ?></label>
				<select  name="<?php echo esc_attr( $this->get_field_name( 'shape_color' ) ); ?>" style="width:100%;">
				<?php
					movedo_ext_print_select_options(
						array(
							'primary-1' => __( 'Primary 1', 'movedo-extension' ),
							'primary-2' => __( 'Primary 2', 'movedo-extension' ),
							'primary-3' => __( 'Primary 3', 'movedo-extension' ),
							'primary-4' => __( 'Primary 4', 'movedo-extension' ),
							'primary-5' => __( 'Primary 5', 'movedo-extension' ),
							'primary-6' => __( 'Primary 6', 'movedo-extension' ),
							'green' => __( 'Green', 'movedo-extension' ),
							'orange' => __( 'Orange', 'movedo-extension' ),
							'red' => __( 'Red', 'movedo-extension' ),
							'blue' => __( 'Blue', 'movedo-extension' ),
							'aqua' => __( 'Aqua', 'movedo-extension' ),
							'purple' => __( 'Purple', 'movedo-extension' ),
							'black' => __( 'Black', 'movedo-extension' ),
							'grey' => __( 'Grey', 'movedo-extension' ),
							'white' => __( 'White', 'movedo-extension' ),
						),
						$shape_color
					);
				?>
				</select>
			</p>

			<p>
					<em><?php echo esc_html__( 'Note: Make sure you include the full URL (i.e. http://www.samplesite.com)', 'movedo-extension' ); ?></em>
					<br>
					 <?php echo esc_html__( 'If you do not want a social to be visible, simply delete the supplied URL.', 'movedo-extension' ); ?>
			</p>

			<?php
			if ( isset( $movedo_grve_social_list_extended ) ) {
				foreach ( $movedo_grve_social_list_extended as $social_item ) {

				$social_item_url = movedo_ext_vce_array_value( $instance, $social_item['url'] );
			?>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( $social_item['url'] ) ); ?>"><?php echo esc_html( $social_item['title'] ); ?>:</label>
						<input style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id( $social_item['url'] ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $social_item['url'] ) ); ?>" value="<?php echo esc_attr( $social_item_url ); ?>" />
					</p>

			<?php
				}
			}
			?>

		<?php
		}
	}
}
//Omit closing PHP tag to avoid accidental whitespace output errors.
