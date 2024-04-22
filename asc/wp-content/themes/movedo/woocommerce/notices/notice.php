<?php
/**
 * Show messages
 *
 * @package 	WooCommerce/Templates
 * @version 8.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( version_compare( WC_VERSION, '3.9', '<' ) ) {
	if ( ! $messages ){
		return;
	}
?>
	<?php foreach ( $messages as $message ) : ?>
		<div class="woocommerce-info grve-woo-info grve-bg-blue">
			<?php echo wp_kses_post( $message ); ?>
		</div>
	<?php endforeach;
} else {
	if ( ! $notices ) {
		return;
	}
?>
	<?php foreach ( $notices as $notice ) : ?>
		<div class="woocommerce-info grve-woo-info grve-bg-blue"<?php echo wc_get_notice_data_attr( $notice ); ?>>
			<?php echo wc_kses_notice( $notice['notice'] ); ?>
		</div>
	<?php endforeach; ?>
<?php
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
