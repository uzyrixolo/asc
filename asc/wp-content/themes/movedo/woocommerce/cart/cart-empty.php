<?php
/**
 * Empty cart page
 *
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( version_compare( WC_VERSION, '3.5.0', '<' ) ) {
	wc_print_notices();
}
do_action( 'woocommerce_cart_is_empty' );
?>
<div class="grve-empty-cart cart-empty">
	<div class="grve-h6"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></div>
	<?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<a class="grve-link-text grve-text-primary-1 grve-text-hover-black" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
		<?php echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) ); ?>
	</a>
	<?php endif; ?>
</div>
