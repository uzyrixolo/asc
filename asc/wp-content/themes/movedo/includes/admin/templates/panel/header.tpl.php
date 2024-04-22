<?php
/**
 * The template for the panel header area.
 * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
 *
 * @author      Redux Framework
 * @package     ReduxFramework/Templates
 * @version:    4.0.0
 */
?>
<div class="grve-redux-header">
	<div class="grve-redux-header-inner">
		<?php if ( ! empty( $this->parent->args['display_name'] ) ) { ?>
			<div class="display_header">
				<div class="grve-redux-logo-wrap">
					<div class="grve-redux-logo"><?php movedo_grve_panel_logo(); ?></div>
					<?php if ( ! empty( $this->parent->args['display_version'] ) ) { ?>
						<span class="grve-theme-version"><?php echo wp_kses_post( $this->parent->args['display_version'] ); ?></span>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>