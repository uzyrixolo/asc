<?php
/**
 * Mini-cart
 *
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

if ( function_exists( 'wc_get_cart_url' ) ) {
	$get_cart_url = wc_get_cart_url();
} else {
	$get_cart_url = WC()->cart->get_cart_url();
}
if ( function_exists( 'wc_get_checkout_url' ) ) {
	$get_checkout_url = wc_get_checkout_url();
} else {
	$get_checkout_url = WC()->cart->get_checkout_url();
}
do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<?php
					if ( function_exists( 'wc_get_cart_remove_url' ) ) {
						$get_cart_remove_url = wc_get_cart_remove_url( $cart_item_key );
					} else {
						$get_cart_remove_url = WC()->cart->get_remove_url( $cart_item_key );
					}
					echo apply_filters(
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove remove_from_cart_button" title="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="eut-icon eut-icon-close"></i></a>',
							esc_url( $get_cart_remove_url ),
							esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), $product_name ) ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						),
						$cart_item_key
					);
					?>
					<?php if ( empty( $product_permalink ) ) : ?>
						<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . wp_kses_post( $product_name ); ?>
					<?php else : ?>
						<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
							<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . wp_kses_post( $product_name ); ?>
						</a>
					<?php endif; ?>
					<?php
						if ( function_exists( 'wc_get_formatted_cart_item_data' ) ) {
							echo wc_get_formatted_cart_item_data( $cart_item );
						} else {
							echo WC()->cart->get_item_data( $cart_item );
						}
					?>
					<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
				</li>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
	</ul>

	<div class="grve-subtotal grve-link-text"><strong><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></div>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="buttons">
		<a href="<?php echo esc_url( $get_cart_url ); ?>" class="grve-btn grve-btn-extrasmall grve-bg-primary-1 grve-bg-hover-black"><?php esc_html_e( 'View cart', 'woocommerce' ); ?></a>
		<a href="<?php echo esc_url( $get_checkout_url ); ?>" class="grve-btn grve-btn-extrasmall grve-bg-grey grve-bg-hover-black"><?php esc_html_e( 'Checkout', 'woocommerce' ); ?></a>
	</p>

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message empty"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' );

//Omit closing PHP tag to avoid accidental whitespace output errors.
