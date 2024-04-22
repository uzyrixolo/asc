<?php
/**
 * The template for the header sticky bar.
 * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
 *
 * @author        Redux Framework
 * @package       ReduxFramework/Templates
 * @version:      4.4.2
 */

?>
<div id="redux-sticky">
	<div id="info_bar">
		<div class="redux-action_bar">
			<span class="spinner"></span>
			<?php
			if ( false === $this->parent->args['hide_save'] ) {
				submit_button( esc_attr__( 'Save Changes', 'movedo' ), 'primary', 'redux_save', false, array( 'id' => 'redux_top_save' ) );
			}

			if ( false === $this->parent->args['hide_reset'] ) {
				submit_button( esc_attr__( 'Reset Section', 'movedo' ), 'secondary', $this->parent->args['opt_name'] . '[defaults-section]', false, array( 'id' => 'redux-defaults-section-top' ) );
				submit_button( esc_attr__( 'Reset All', 'movedo' ), 'secondary', $this->parent->args['opt_name'] . '[defaults]', false, array( 'id' => 'redux-defaults-top' ) );
			}
			?>
		</div>
		<div class="clear"></div>
	</div>
</div>
