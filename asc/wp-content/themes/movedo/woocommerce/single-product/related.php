<?php
/**
 * Related Products
 *
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<div id="grve-related-products" class="grve-bookmark clearfix">
		<div class="grve-container grve-margin-top-3x grve-padding-top-3x grve-border grve-border-top">
			<div class="grve-wrapper">
				<div class="related products">
					<?php
					$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );
					if ( $heading ) :
					?>
						<h5><?php echo esc_html( $heading ); ?></h5>
					<?php
					endif;
					?>

					<?php woocommerce_product_loop_start(); ?>

						<?php foreach ( $related_products as $related_product ) : ?>

							<?php
								$post_object = get_post( $related_product->get_id() );

								setup_postdata( $GLOBALS['post'] =& $post_object );

								wc_get_template_part( 'content', 'product' ); ?>

						<?php endforeach; ?>

					<?php woocommerce_product_loop_end(); ?>

				</div>
			</div>
		</div>
	</div>

	<?php
endif;

wp_reset_postdata();

//Omit closing PHP tag to avoid accidental whitespace output errors.
