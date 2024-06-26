<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $woocommerce_loop;

if ( version_compare( WC_VERSION, '3.0', '<' ) ) {

	if ( ! $upsells = $product->get_upsells() ) {
		return;
	}

	$product_get_id = method_exists( $product, 'get_id' ) ? $product->get_id() : $product->id;

	$args = array(
		'post_type'           => 'product',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
		'posts_per_page'      => $posts_per_page,
		'orderby'             => $orderby,
		'post__in'            => $upsells,
		'post__not_in'        => array( $product_get_id ),
		'meta_query'          => WC()->query->get_meta_query()
	);

	$products                    = new WP_Query( $args );
	$woocommerce_loop['name']    = 'up-sells';
	$woocommerce_loop['columns'] = apply_filters( 'woocommerce_up_sells_columns', $columns );

	if ( $products->have_posts() ) : ?>
	<div id="grve-up-cells-products" class="grve-bookmark clearfix">
		<div class="grve-container grve-margin-top-3x grve-padding-top-3x grve-border grve-border-top">
			<div class="grve-wrapper">
				<div class="upsells products">

					<h5><?php esc_html_e( 'You may also like&hellip;', 'woocommerce' ) ?></h5>

					<?php woocommerce_product_loop_start(); ?>

						<?php while ( $products->have_posts() ) : $products->the_post(); ?>

							<?php wc_get_template_part( 'content', 'product' ); ?>

						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

				</div>
			</div>
		</div>
	</div>
	<?php endif;
} else {

	if ( $upsells ) : ?>

	<div id="grve-up-cells-products" class="grve-bookmark clearfix">
		<div class="grve-container grve-margin-top-3x grve-padding-top-3x grve-border grve-border-top">
			<div class="grve-wrapper">
				<div class="upsells products">

					<h5><?php esc_html_e( 'You may also like&hellip;', 'woocommerce' ) ?></h5>

					<?php woocommerce_product_loop_start(); ?>

						<?php foreach ( $upsells as $upsell ) : ?>

							<?php
								$post_object = get_post( $upsell->get_id() );

								setup_postdata( $GLOBALS['post'] =& $post_object );

								wc_get_template_part( 'content', 'product' ); ?>

						<?php endforeach; ?>

					<?php woocommerce_product_loop_end(); ?>

				</div>
			</div>
		</div>
	</div>

	<?php endif;
}

wp_reset_postdata();

//Omit closing PHP tag to avoid accidental whitespace output errors.
