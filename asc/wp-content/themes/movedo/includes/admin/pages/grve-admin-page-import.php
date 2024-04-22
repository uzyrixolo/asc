<?php
/*
*	Admin Page Import
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'Movedo_Importer' ) ) {
	$import_url = admin_url( 'admin.php?import=movedo-demo-importer' );
} else {
	$import_url = admin_url( 'admin.php?page=movedo-tgmpa-install-plugins' );
}

?>
	<div id="grve-import-wrap" class="wrap">
		<h2><?php esc_html_e( "Import Demos", 'movedo' ); ?></h2>
		<?php movedo_grve_print_admin_links('import'); ?>
		<div id="grve-import-panel" class="grve-admin-panel">
			<div class="grve-admin-panel-content">
				<h2><?php esc_html_e( "The Easiest Ways to Import Movedo Demo Content", 'movedo' ); ?></h2>
				<p class="about-description"><?php esc_html_e( "Movedo offers you two options to import the content of our theme. With the first one, the Import on Demand, you can import specific pages, posts, portfolios. With the second one, the Full Import Demo, you can import any of the available demos. It's up to you!", 'movedo' ); ?></p>
				<?php if ( class_exists( 'movedo_Importer' ) ) { ?>
				<a href="<?php echo esc_url( $import_url ); ?>" class="grve-admin-panel-btn"><?php esc_html_e( "Import Demos", 'movedo' ); ?></a>
				<?php } else { ?>
				<a href="<?php echo esc_url( $import_url ); ?>" class="grve-admin-panel-btn"><?php esc_html_e( "Install/Activate Demo Importer", 'movedo' ); ?></a>
				<?php } ?>
				<div class="grve-admin-panel-container">
					<div class="grve-admin-panel-row">
						<div class="grve-admin-panel-column grve-admin-panel-column-1-2">
							<div class="grve-admin-panel-column-content">
								<iframe width="100%" height="290" src="https://www.youtube-nocookie.com/embed/DUClbt0UVAU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								<h3><?php esc_html_e( "Import on Demand", 'movedo' ); ?></h3>
								<p><?php esc_html_e( "Do you just need specific pages or portfolios, posts, products of our demo content to create your site? Select the ones you prefer via the available multi selectors under Movedo Demos.", 'movedo' ); ?></p>
							</div>
						</div>
						<div class="grve-admin-panel-column grve-admin-panel-column-1-2">
							<div class="grve-admin-panel-column-content">
								<iframe width="100%" height="290" src="https://www.youtube-nocookie.com/embed/R5BwkexYx0Q" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								<h3><?php esc_html_e( "Full Import", 'movedo' ); ?></h3>
								<p><?php esc_html_e( "Of course, you can still import the whole dummy content. With Movedo you have the possibility to import any of the demos with just ONE click.", 'movedo' ); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php

//Omit closing PHP tag to avoid accidental whitespace output errors.
