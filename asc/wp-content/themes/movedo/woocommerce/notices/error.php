<?php
/**
 * Show error messages
 *
 * @package 	WooCommerce/Templates
 * @version 8.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( version_compare( WC_VERSION, '3.9', '<' ) ) {
	if ( ! $messages ){
		return;
	}
?>
	<ul class="woocommerce-error grve-woo-error grve-bg-red" role="alert">
		<?php foreach ( $messages as $message ) : ?>
			<li>
				<?php echo wp_kses_post( $message ); ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php
} else {
	if ( ! $notices ) {
		return;
	}
?>
	<ul class="woocommerce-error grve-woo-error grve-bg-red" role="alert">
		<?php foreach ( $notices as $notice ) : ?>
			<li<?php echo wc_get_notice_data_attr( $notice ); ?>>
				<?php echo wc_kses_notice( $notice['notice'] ); ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
