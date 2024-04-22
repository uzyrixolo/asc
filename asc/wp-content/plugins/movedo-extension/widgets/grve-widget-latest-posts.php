<?php
/**
 * Greatives Latest Posts
 * A widget that displays latest posts.
 * @author		Greatives Team
 * @URI			http://greatives.eu
 */

if ( ! class_exists( 'Movedo_Ext_Widget_Latest_Posts' ) ) {
	class Movedo_Ext_Widget_Latest_Posts extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname' => 'grve-widget grve-latest-news',
				'description' => esc_html__( 'A widget that displays latest posts', 'movedo-extension'),
			);
			$control_ops = array(
				'width' => 300,
				'height' => 400,
				'id_base' => 'grve-widget-latest-posts',
			);
			parent::__construct( 'grve-widget-latest-posts', '(Greatives) ' . esc_html__( 'Latest Posts', 'movedo-extension' ), $widget_ops, $control_ops );
		}

		function movedo_ext_widget_latest_posts() {
			$this->__construct();
		}

		function widget( $args, $instance ) {

			//Our variables from the widget settings.
			extract( $args );
			
			$show_image = movedo_ext_vce_array_value( $instance, 'show_image' );
			$num_of_posts = movedo_ext_vce_array_value( $instance, 'num_of_posts', 5 );
			$categories = movedo_ext_vce_array_value( $instance, 'categories' );

			echo $before_widget; // XSS OK

			// Display the widget title
			$title = movedo_ext_vce_array_value( $instance, 'title' );
			$title = apply_filters( 'widget_title', $title );
			if ( $title ) {
				echo $before_title . esc_html( $title ) . $after_title; // XSS OK
			}

			$args = array(
				'post_type' => 'post',
				'post_status'=>'publish',
				'paged' => 1,
				'cat' => $categories,
				'posts_per_page' => $num_of_posts,
			);
			//Loop posts
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) :
			?>
				<ul>
			<?php

			$movedo_grve_empty_image_url = MOVEDO_EXT_PLUGIN_DIR_URL .'assets/images/empty/thumbnail.jpg';

			while ( $query->have_posts() ) : $query->the_post();

				$movedo_grve_link = get_permalink();
				$movedo_grve_target = '_self';

				if ( 'link' == get_post_format() ) {
					$movedo_grve_link = get_post_meta( get_the_ID(), '_movedo_grve_post_link_url', true );
					$new_window = get_post_meta( get_the_ID(), '_movedo_grve_post_link_new_window', true );
					if( empty( $movedo_grve_link ) ) {
						$movedo_grve_link = get_permalink();
					}

					if( !empty( $new_window ) ) {
						$movedo_grve_target = '_blank';
					}
				}

			?>

					<li <?php post_class(); ?>>
						<?php if( $show_image && '1' == $show_image ) { ?>
							<a href="<?php echo esc_url( $movedo_grve_link ); ?>" target="<?php echo esc_attr( $movedo_grve_target ); ?>" title="<?php the_title_attribute(); ?>" class="grve-post-thumb">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="grve-bg-wrapper grve-small-square">
									<?php movedo_ext_print_post_bg_image( 'thumbnail' ); ?>
								</div>
								<?php the_post_thumbnail( 'thumbnail' ); ?>
							<?php } else { ?>
								<img width="80" height="80" src="<?php echo esc_url( $movedo_grve_empty_image_url ); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
							<?php } ?>
							</a>
						<?php } ?>
						<div class="grve-news-content">
							<a href="<?php echo esc_url( $movedo_grve_link ); ?>" target="<?php echo esc_attr( $movedo_grve_target ); ?>" class="grve-title"><?php the_title(); ?></a>
							<?php if ( function_exists( 'movedo_grve_visibility' ) && movedo_grve_visibility( 'blog_date_visibility', '1' ) ) { ?>
							<div class="grve-latest-news-date"><?php echo esc_html( get_the_date() ); ?></div>
							<?php } ?>
						</div>
					</li>

			<?php
			endwhile;
			?>
				</ul>
			<?php
			else :
			?>
					<?php echo esc_html__( 'No Posts Found!', 'movedo-extension' ); ?>
			<?php
			endif;

			wp_reset_postdata();

			echo $after_widget; // XSS OK
		}

		//Update the widget

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			$categories = movedo_ext_vce_array_value( $new_instance, 'categories' );
			$show_image = movedo_ext_vce_array_value( $new_instance, 'show_image' );
			if ( is_array( $categories ) ) {
				$categories = implode( ',', $categories );
			}	

			//Strip tags from title and name to remove HTML
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['num_of_posts'] = strip_tags( $new_instance['num_of_posts'] );
			$instance['show_image'] = strip_tags( $show_image );
			$instance['categories'] = $categories;

			return $instance;
		}


		function form( $instance ) {

			//Set up some default widget settings.
			$defaults = array(
				'title' => '',
				'num_of_posts' => '5',
				'show_image' => '0',
				'categories' => '',
			);
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>


			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'movedo-extension' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'num_of_posts' ) ); ?>"><?php echo esc_html__( 'Number of Posts:', 'movedo-extension' ); ?></label>
				<select  name="<?php echo esc_attr( $this->get_field_name( 'num_of_posts' ) ); ?>" style="width:100%;">
					<?php
					for ( $i = 1; $i <= 20; $i++ ) {
					?>
						<option value="<?php echo esc_attr( $i ); ?>" <?php selected( $instance['num_of_posts'], $i ); ?>><?php echo esc_html( $i ); ?></option>
					<?php
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>"><?php echo esc_html__( 'Show Featured Image:', 'movedo-extension' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id('show_image') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_image') ); ?>" type="checkbox" value="1" <?php checked( $instance['show_image'], 1 ); ?> />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>"><?php echo esc_html__( 'Categories:', 'movedo-extension' ) ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'categories' ) ); ?>[]" multiple="multiple" style="width:100%;">
					<option value=""><?php echo esc_html__( 'Choose Categories ...', 'movedo-extension' ) ?></option>
				<?php
					$categories = get_terms( 'category' );
					foreach ( $categories as $category ) {
						$selected = '';
						$cats = explode( ',', $instance['categories'] );
						foreach ( $cats as $cat ) {
							if ( $cat == $category->term_id ){
								$selected = $cat;
								break;
							}
						}
					?>
					<option value="<?php echo esc_attr( $category->term_id ); ?>" <?php selected( $category->term_id  ,$selected ); ?> >
						<?php echo esc_html( $category->name ); ?>
					</option>
				<?php
					}
				?>
				</select>
			</p>

		<?php
		}
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
