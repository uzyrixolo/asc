<?php

/*
*	Main theme functions and definitions
*
* 	@version	3.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

/**
 * Theme Definitions
 * Please leave these settings unchanged
 */

define( 'MOVEDO_GRVE_THEME_VERSION', '3.6.2' );
define( 'MOVEDO_GRVE_THEME_REDUX_CUSTOM_PANEL', false);

/**
 * Set up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1080;
}

/**
 * Theme textdomain - must be loaded before redux
 */
load_theme_textdomain( 'movedo', get_template_directory() . '/languages' );

/**
 * Include Global helper files
 */
require_once get_template_directory() . '/includes/grve-gutenberg.php';
require_once get_template_directory() . '/includes/grve-global.php';
require_once get_template_directory() . '/includes/grve-meta-tags.php';
require_once get_template_directory() . '/includes/grve-privacy-functions.php';
require_once get_template_directory() . '/includes/grve-woocommerce-functions.php';
require_once get_template_directory() . '/includes/grve-bbpress-functions.php';
require_once get_template_directory() . '/includes/grve-events-calendar-functions.php';

/**
 * Register Plugins Libraries
 */
if ( is_admin() ) {
	require_once get_template_directory() . '/includes/plugins/tgm-plugin-activation/register-plugins.php';
}

require_once get_template_directory() . '/includes/admin/grve-admin-custom-sidebars.php';
require_once get_template_directory() . '/includes/admin/grve-admin-screens.php';

/**
 * ReduxFramework
 */
require_once get_template_directory() . '/includes/admin/grve-redux-extension-loader.php';

if ( !class_exists( 'ReduxFramework' ) && file_exists( get_template_directory() . '/includes/framework/framework.php' ) ) {
    require_once get_template_directory() . '/includes/framework/framework.php';
}

if ( !isset( $redux_demo ) ) {
	require_once get_template_directory() . '/includes/admin/grve-redux-framework-config.php';
}

function movedo_grve_remove_redux_demo_link() {
    if ( class_exists('Redux_Framework_Plugin') ) {
		call_user_func( 'remove' . '_filter', 'plugin_row_meta', array( Redux_Framework_Plugin::instance(), 'plugin_metalinks' ), null, 2 );
        remove_action('admin_notices', array( Redux_Framework_Plugin::get_instance(), 'admin_notices' ) );
    }
	if ( class_exists('ReduxFrameworkPlugin') ) {
		call_user_func( 'remove' . '_filter', 'plugin_row_meta', array( ReduxFrameworkPlugin::instance(), 'plugin_metalinks' ), null, 2 );
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
    }
}
add_action('init', 'movedo_grve_remove_redux_demo_link');

/**
 * Custom Nav Menus
 */
require_once get_template_directory() . '/includes/custom-menu/grve-custom-nav-menu.php';

/**
 * Visual Composer Extentions
 */
if ( class_exists( 'WPBakeryShortCode' ) ) {

	function movedo_grve_add_vc_extentions() {
		require_once get_template_directory() . '/vc_extend/grve-shortcodes-vc-helper.php';
		require_once get_template_directory() . '/vc_extend/grve-shortcodes-vc-remove.php';
		require_once get_template_directory() . '/vc_extend/grve-shortcodes-vc-add.php';
	}
	add_action( 'init', 'movedo_grve_add_vc_extentions', 5 );

}

/**
 * Include admin helper files
 */
require_once get_template_directory() . '/includes/admin/grve-admin-functions.php';
require_once get_template_directory() . '/includes/admin/grve-admin-option-functions.php';
require_once get_template_directory() . '/includes/admin/grve-admin-feature-functions.php';
require_once get_template_directory() . '/includes/admin/grve-update-functions.php';

require_once get_template_directory() . '/includes/admin/grve-meta-functions.php';
require_once get_template_directory() . '/includes/admin/grve-category-meta.php';
require_once get_template_directory() . '/includes/admin/grve-post-meta.php';

require_once get_template_directory() . '/includes/admin/grve-portfolio-meta.php';
require_once get_template_directory() . '/includes/admin/grve-testimonial-meta.php';
require_once get_template_directory() . '/includes/grve-wp-gallery.php';

/**
 * Include Dynamic css
 */
require_once get_template_directory() . '/includes/grve-typography-functions.php'; 
require_once get_template_directory() . '/includes/grve-dynamic-css-loader.php';

/**
 * Include helper files
 */
require_once get_template_directory() . '/includes/grve-breadcrumbs.php';
require_once get_template_directory() . '/includes/grve-excerpt.php';
require_once get_template_directory() . '/includes/grve-vce-functions.php';
require_once get_template_directory() . '/includes/grve-header-functions.php';
require_once get_template_directory() . '/includes/grve-feature-functions.php';
require_once get_template_directory() . '/includes/grve-layout-functions.php';
require_once get_template_directory() . '/includes/grve-blog-functions.php';
require_once get_template_directory() . '/includes/grve-portfolio-functions.php';
require_once get_template_directory() . '/includes/grve-media-functions.php';
require_once get_template_directory() . '/includes/grve-footer-functions.php';

add_action( 'after_switch_theme', 'movedo_grve_theme_activate' );
add_action( 'after_setup_theme', 'movedo_grve_theme_setup' );
add_action( 'widgets_init', 'movedo_grve_register_sidebars' );

/**
 * Theme activation function
 * Used whe activating the theme
 */
function movedo_grve_theme_activate() {
	update_option( 'movedo_grve_theme_version', MOVEDO_GRVE_THEME_VERSION );
	flush_rewrite_rules();
}

/**
 * Theme setup function
 * Theme support
 */

function movedo_grve_theme_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'video', 'audio' ) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );
	add_theme_support( 'yoast-seo-breadcrumbs' );

    add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name' => __( 'Primary 1', 'movedo' ),
				'slug' => 'primary-1',
				'color' => movedo_grve_option( 'body_primary_1_color' ),
			),
			array(
				'name' => __( 'Primary 2', 'movedo' ),
				'slug' => 'primary-2',
				'color' => movedo_grve_option( 'body_primary_2_color' ),
			),
			array(
				'name' => __( 'Primary 3', 'movedo' ),
				'slug' => 'primary-3',
				'color' => movedo_grve_option( 'body_primary_3_color' ),
			),
			array(
				'name' => __( 'Primary 4', 'movedo' ),
				'slug' => 'primary-4',
				'color' => movedo_grve_option( 'body_primary_4_color' ),
			),
			array(
				'name' => __( 'Primary 5', 'movedo' ),
				'slug' => 'primary-5',
				'color' => movedo_grve_option( 'body_primary_5_color' ),
			),
			array(
				'name' => __( 'Green', 'movedo' ),
				'slug' => 'green',
				'color' => '#6ECA09',
			),
			array(
				'name' => __( 'Red', 'movedo' ),
				'slug' => 'red',
				'color' => '#D0021B',
			),
			array(
				'name' => __( 'Orange', 'movedo' ),
				'slug' => 'orange',
				'color' => '#FAB901',
			),
			array(
				'name' => __( 'Aqua', 'movedo' ),
				'slug' => 'aqua',
				'color' => '#28d2dc',
			),
			array(
				'name' => __( 'Blue', 'movedo' ),
				'slug' => 'blue',
				'color' => '#15c7ff',
			),
			array(
				'name' => __( 'Purple', 'movedo' ),
				'slug' => 'purple',
				'color' => '#7639e2',
			),
			array(
				'name' => __( 'Grey', 'movedo' ),
				'slug' => 'grey',
				'color' => '#e2e2e2',
			),
			array(
				'name' => __( 'Black', 'movedo' ),
				'slug' => 'black',
				'color' => '#000000',
			),
			array(
				'name' => __( 'White', 'movedo' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
		)
	);

	movedo_grve_image_sizes();

	register_nav_menus(
		array(
			'movedo_header_nav' => esc_html__( 'Header Menu', 'movedo' ),
			'movedo_responsive_nav' => esc_html__( 'Responsive Menu', 'movedo' ),
			'movedo_top_left_nav' => esc_html__( 'Top Left Menu', 'movedo' ),
			'movedo_top_right_nav' => esc_html__( 'Top Right Menu', 'movedo' ),
			'movedo_footer_nav' => esc_html__( 'Footer Menu', 'movedo' ),
		)
	);

}


if ( ! function_exists( 'movedo_grve_image_sizes' ) ) {
	function movedo_grve_image_sizes() {
		add_image_size( 'movedo-grve-large-rect-horizontal', 1170, 658, true );
		add_image_size( 'movedo-grve-small-square', 560, 560, true );
		add_image_size( 'movedo-grve-small-rect-horizontal', 560, 420, true );
		add_image_size( 'movedo-grve-small-rect-vertical', 560, 747, true );
		add_image_size( 'movedo-grve-medium-square', 900, 900, true );
		add_image_size( 'movedo-grve-medium-rect-horizontal', 900, 675, true );
		add_image_size( 'movedo-grve-medium-rect-vertical', 840, 1120, true );
		add_image_size( 'movedo-grve-fullscreen', 1920, 1920, false );
	}
}

function movedo_grve_add_excerpt_support_for_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'movedo_grve_add_excerpt_support_for_pages' );

/**
 * Navigation Menus
 */
if ( ! function_exists( 'movedo_grve_get_header_nav' ) ) {
	function movedo_grve_get_header_nav() {

		$movedo_grve_main_menu = '';

		if ( 'default' == movedo_grve_option( 'menu_header_integration', 'default' ) ) {

			if ( is_singular() ) {
				if ( 'yes' == movedo_grve_post_meta( '_movedo_grve_disable_menu' ) ) {
					return 'disabled';
				} else {
					$movedo_grve_main_menu = movedo_grve_post_meta( '_movedo_grve_main_navigation_menu' );
					if( !empty( $movedo_grve_main_menu ) ) {
						$movedo_grve_main_menu = apply_filters( 'wpml_object_id', $movedo_grve_main_menu, 'nav_menu', TRUE  );
					}
				}
			} else if ( movedo_grve_is_woo_shop() ) {
				if ( 'yes' == movedo_grve_post_meta_shop( '_movedo_grve_disable_menu' ) ) {
					return 'disabled';
				} else {
					$movedo_grve_main_menu	= movedo_grve_post_meta_shop( '_movedo_grve_main_navigation_menu' );
					if( !empty( $movedo_grve_main_menu ) ) {
						$movedo_grve_main_menu = apply_filters( 'wpml_object_id', $movedo_grve_main_menu, 'nav_menu', TRUE  );
					}
				}
			}
		} else {
			$movedo_grve_main_menu = 'disabled';
		}

		return $movedo_grve_main_menu;
	}
}

if ( ! function_exists( 'movedo_grve_get_responsive_nav' ) ) {
	function movedo_grve_get_responsive_nav() {

		$movedo_grve_main_menu = '';

		if ( 'default' == movedo_grve_option( 'menu_header_integration', 'default' ) ) {

			if ( is_singular() ) {
				if ( 'yes' == movedo_grve_post_meta( '_movedo_grve_disable_menu' ) ) {
					return 'disabled';
				} else {
					$movedo_grve_main_menu	= movedo_grve_post_meta( '_movedo_grve_responsive_navigation_menu' );
					if( !empty( $movedo_grve_main_menu ) ) {
						$movedo_grve_main_menu = apply_filters( 'wpml_object_id', $movedo_grve_main_menu, 'nav_menu', TRUE  );
					}
				}
			} else if ( movedo_grve_is_woo_shop() ) {
				if ( 'yes' == movedo_grve_post_meta_shop( '_movedo_grve_disable_menu' ) ) {
					return 'disabled';
				} else {
					$movedo_grve_main_menu	= movedo_grve_post_meta_shop( '_movedo_grve_responsive_navigation_menu' );
					if( !empty( $movedo_grve_main_menu ) ) {
						$movedo_grve_main_menu = apply_filters( 'wpml_object_id', $movedo_grve_main_menu, 'nav_menu', TRUE  );
					}
				}
			}
		} else {
			$movedo_grve_main_menu = 'disabled';
		}

		return $movedo_grve_main_menu;
	}
}

if ( ! function_exists( 'movedo_grve_header_nav' ) ) {
	function movedo_grve_header_nav( $movedo_grve_main_menu = '', $movedo_grve_header_menu_mode = 'default') {

		if( 'split' == $movedo_grve_header_menu_mode ) {
			$walker = new Movedo_Grve_Split_Navigation_Walker();
		} else {
			$walker = new Movedo_Grve_Main_Navigation_Walker();
		}

		if ( empty( $movedo_grve_main_menu ) ) {
			wp_nav_menu(
				array(
					'menu_class' => 'grve-menu', /* menu class */
					'theme_location' => 'movedo_header_nav', /* where in the theme it's assigned */
					'container' => false,
					'fallback_cb' => 'movedo_grve_fallback_menu',
					'link_before' => '<span class="grve-item">',
					'link_after' => '</span>',
					'walker' => $walker,
				)
			);
		} else {
			//Custom Alternative Menu
			wp_nav_menu(
				array(
					'menu_class' => 'grve-menu', /* menu class */
					'menu' => $movedo_grve_main_menu, /* menu name */
					'container' => false,
					'fallback_cb' => 'movedo_grve_fallback_menu',
					'link_before' => '<span class="grve-item">',
					'link_after' => '</span>',
					'walker' => $walker,
				)
			);
		}
	}
}

if ( ! function_exists( 'movedo_grve_responsive_nav' ) ) {
	function movedo_grve_responsive_nav( $movedo_grve_main_menu = '' ) {

		if ( empty( $movedo_grve_main_menu ) ) {
			wp_nav_menu(
				array(
					'menu_class' => 'grve-menu', /* menu class */
					'theme_location' => 'movedo_responsive_nav', /* where in the theme it's assigned */
					'container' => false,
					'fallback_cb' => 'movedo_grve_fallback_menu',
					'link_before' => '<span class="grve-item">',
					'link_after' => '</span>',
					'walker' => new Movedo_Grve_Main_Navigation_Walker(),
				)
			);
		} else {
			//Custom Alternative Menu
			wp_nav_menu(
				array(
					'menu_class' => 'grve-menu', /* menu class */
					'menu' => $movedo_grve_main_menu, /* menu name */
					'container' => false,
					'fallback_cb' => 'movedo_grve_fallback_menu',
					'link_before' => '<span class="grve-item">',
					'link_after' => '</span>',
					'walker' => new Movedo_Grve_Main_Navigation_Walker(),
				)
			);
		}
	}
}

/**
 * Main Navigation FallBack Menu
 */
if ( ! function_exists( 'movedo_grve_fallback_menu' ) ) {
	function movedo_grve_fallback_menu(){

		if( current_user_can( 'administrator' ) ) {
			echo '<span class="grve-no-assigned-menu grve-small-text">';
			echo esc_html__( 'Header Menu is not assigned!', 'movedo'  ) . " " .
			"<a href='" . esc_url( admin_url() ) . "nav-menus.php?action=locations' target='_blank'>" . esc_html__( "Manage Locations", 'movedo' ) . "</a>";
			echo '</span>';
		}
	}
}

if ( ! function_exists( 'movedo_grve_footer_nav' ) ) {
	function movedo_grve_footer_nav() {
		wp_nav_menu(
			array(
				'theme_location' => 'movedo_footer_nav',
				'container' => false, /* no container */
				'depth' => '1',
				'fallback_cb' => false,
				'walker' => new Movedo_Grve_Simple_Navigation_Walker(),
			)
		);
	}
}

if ( ! function_exists( 'movedo_grve_top_left_nav' ) ) {
	function movedo_grve_top_left_nav() {
		wp_nav_menu(
			array(
				'theme_location' => 'movedo_top_left_nav',
				'container' => false, /* no container */
				'depth' => '2',
				'fallback_cb' => false,
				'walker' => new Movedo_Grve_Simple_Navigation_Walker(),
			)
		);
	}
}
if ( ! function_exists( 'movedo_grve_top_right_nav' ) ) {
	function movedo_grve_top_right_nav() {
		wp_nav_menu(
			array(
				'theme_location' => 'movedo_top_right_nav',
				'container' => false, /* no container */
				'depth' => '2',
				'fallback_cb' => false,
				'walker' => new Movedo_Grve_Simple_Navigation_Walker(),
			)
		);
	}
}

/**
 * Sidebars & Widgetized Areas
 */
function movedo_grve_register_sidebars() {

	$sidebar_heading_tag = movedo_grve_option( 'sidebar_heading_tag', 'div' );
	$footer_heading_tag = movedo_grve_option( 'footer_heading_tag', 'div' );

	register_sidebar( array(
		'id' => 'grve-default-sidebar',
		'name' => esc_html__( 'Main Sidebar', 'movedo' ),
		'description' => esc_html__( 'Main Sidebar Widget Area', 'movedo' ),
		'before_widget' => '<div id="%1$s" class="grve-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $sidebar_heading_tag ) . ' class="grve-widget-title">',
		'after_title' => '</' . tag_escape( $sidebar_heading_tag ) . '>',
	));

	register_sidebar( array(
		'id' => 'grve-single-portfolio-sidebar',
		'name' => esc_html__( 'Single Portfolio', 'movedo' ),
		'description' => esc_html__( 'Single Portfolio Sidebar Widget Area', 'movedo' ),
		'before_widget' => '<div id="%1$s" class="grve-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $sidebar_heading_tag ) . ' class="grve-widget-title">',
		'after_title' => '</' . tag_escape( $sidebar_heading_tag ) . '>',
	));

	register_sidebar( array(
		'id' => 'grve-footer-1-sidebar',
		'name' => esc_html__( 'Footer 1', 'movedo' ),
		'description' => esc_html__( 'Footer 1 Widget Area', 'movedo' ),
		'before_widget' => '<div id="%1$s" class="grve-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $footer_heading_tag ) . ' class="grve-widget-title">',
		'after_title' => '</' . tag_escape( $footer_heading_tag ) . '>',
	));
	register_sidebar( array(
		'id' => 'grve-footer-2-sidebar',
		'name' => esc_html__( 'Footer 2', 'movedo' ),
		'description' => esc_html__( 'Footer 2 Widget Area', 'movedo' ),
		'before_widget' => '<div id="%1$s" class="grve-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $footer_heading_tag ) . ' class="grve-widget-title">',
		'after_title' => '</' . tag_escape( $footer_heading_tag ) . '>',
	));
	register_sidebar( array(
		'id' => 'grve-footer-3-sidebar',
		'name' => esc_html__( 'Footer 3', 'movedo' ),
		'description' => esc_html__( 'Footer 3 Widget Area', 'movedo' ),
		'before_widget' => '<div id="%1$s" class="grve-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $footer_heading_tag ) . ' class="grve-widget-title">',
		'after_title' => '</' . tag_escape( $footer_heading_tag ) . '>',
	));
	register_sidebar( array(
		'id' => 'grve-footer-4-sidebar',
		'name' => esc_html__( 'Footer 4', 'movedo' ),
		'description' => esc_html__( 'Footer 4 Widget Area', 'movedo' ),
		'before_widget' => '<div id="%1$s" class="grve-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $footer_heading_tag ) . ' class="grve-widget-title">',
		'after_title' => '</' . tag_escape( $footer_heading_tag ) . '>',
	));

	$movedo_grve_custom_sidebars = get_option( '_movedo_grve_custom_sidebars' );
	if ( ! empty( $movedo_grve_custom_sidebars ) ) {
		foreach ( $movedo_grve_custom_sidebars as $movedo_grve_custom_sidebar ) {
			register_sidebar( array(
				'id' => $movedo_grve_custom_sidebar['id'],
				'name' => esc_html__( 'Custom Sidebar', 'movedo' ) . ': ' . esc_html( $movedo_grve_custom_sidebar['name'] ),
				'description' => '',
				'before_widget' => '<div id="%1$s" class="grve-widget widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<' . tag_escape( $sidebar_heading_tag ) . ' class="grve-widget-title">',
				'after_title' => '</' . tag_escape( $sidebar_heading_tag ) . '>',
			));
		}
	}

}

/**
 * Custom Modal Search Form
 */
if ( ! function_exists( 'movedo_grve_modal_wpsearch' ) ) {
	function movedo_grve_modal_wpsearch( $form = '' ) {

		$search_modal_text = movedo_grve_option( 'search_modal_text' );
		$search_modal_button_text = movedo_grve_option( 'search_modal_button_text' );
		$search_modal_mode = movedo_grve_option( 'search_modal_mode', 'typed' );

		$search_placeholder_class = 'grve-static-placeholder';
		if ( 'typed' == $search_modal_mode ) {
			$search_placeholder_class = 'grve-typed-placeholder';
		}

		$form = '';
		$form .= '<form class="grve-search grve-search-modal" method="get" action="' . esc_url( home_url( '/' ) ) . '" >';
		$form .= '  <div class="grve-search-input-wrapper grve-heading-color">';
		$form .= '    <div class="grve-search-placeholder grve-h1 ' . esc_attr( $search_placeholder_class ) . '"><span class="grve-heading-color" style="font-size:200%;">' . wp_kses( $search_modal_text , array( 'br' => array() ) ) . '</span></div>';
		$form .= '    <input type="text" class="grve-search-textfield grve-h2" value="' . get_search_query() . '" name="s" autocomplete="off" aria-label="' . esc_attr__( 'Search for ...', 'movedo' ) . '"/>';
		$form .= '  </div>';
		$form .= '  <input class="grve-search-btn" type="submit" value="' . esc_attr( $search_modal_button_text  ) . '">';
		if ( defined( 'ICL_SITEPRESS_VERSION' ) && defined( 'ICL_LANGUAGE_CODE' ) ) {
			$form .= '<input type="hidden" name="lang" value="'. esc_attr( ICL_LANGUAGE_CODE ) .'"/>';
		}
		$form .= '</form>';
		return $form;
	}
}

/**
 * Enqueue scripts and styles for the front end.
 */
function movedo_grve_frontend_scripts() {

	$movedo_version = trim( MOVEDO_GRVE_THEME_VERSION );

	wp_register_style( 'movedo-grve-style', get_stylesheet_directory_uri()."/style.css", array(), esc_attr( $movedo_version ), 'all' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '6.4.2' );
	wp_enqueue_style( 'font-awesome-v4-shims', get_template_directory_uri() . '/css/font-awesome-v4-shims.min.css', array( 'font-awesome' ), '6.4.2' );

	wp_enqueue_style( 'movedo-grve-theme-style', get_template_directory_uri() . '/css/theme-style.css', array(), esc_attr( $movedo_version ) );
	wp_enqueue_style( 'movedo-grve-elements', get_template_directory_uri() . '/css/elements.css', array(), esc_attr( $movedo_version ) );

	if ( movedo_grve_woocommerce_enabled() ) {
		wp_enqueue_style( 'movedo-grve-woocommerce-custom', get_template_directory_uri() . '/css/woocommerce-custom.css', array(), esc_attr( $movedo_version ), 'all' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'movedo-grve-custom-style', get_template_directory_uri() . '/css/responsive.css', array(), esc_attr( $movedo_version ) );

	movedo_grve_shop_css();
	movedo_grve_safebutton_area_css();
	movedo_grve_bottom_bar_area_css();
	movedo_grve_load_dynamic_css();

	if ( 'openstreetmap' == movedo_grve_option( 'map_api_mode', 'google-maps' ) ) {
		wp_enqueue_style(  'leaflet', '//unpkg.com/leaflet@1.3.1/dist/leaflet.css', array(), '1.3.1', 'all' );
	}

	if ( is_rtl() ) {
		wp_enqueue_style(  'movedo-grve-rtl',  get_template_directory_uri() . '/css/rtl.css', array(), esc_attr( $movedo_version ), 'all' );
	}

	if ( get_stylesheet_directory_uri() !=  get_template_directory_uri() ) {
		wp_enqueue_style( 'movedo-grve-style');
	}

	if ( movedo_grve_woocommerce_enabled() ) {
		wp_enqueue_script( 'wc-cart-fragments' );
	}

	if ( movedo_grve_is_privacy_key_enabled( 'gmaps' ) ) {
		$gmap_api_key = movedo_grve_option( 'gmap_api_key' );
		if ( !empty( $gmap_api_key ) ) {
			wp_register_script( 'google-maps-api', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $gmap_api_key ), NULL, NULL, true );
		} else {
			wp_register_script( 'google-maps-api', '//maps.googleapis.com/maps/api/js?v=3', NULL, NULL, true );
		}
		wp_register_script( 'leaflet-maps-api', '//unpkg.com/leaflet@1.3.1/dist/leaflet.js', array(), '1.3.1', true );

		wp_register_script( 'youtube-iframe-api', '//www.youtube.com/iframe_api', array(), esc_attr( $movedo_version ), true );

		if ( 'openstreetmap' == movedo_grve_option( 'map_api_mode', 'google-maps' ) ) {
			wp_register_script( 'movedo-grve-maps-script', get_template_directory_uri() . '/js/leaflet-maps.js', array( 'jquery', 'leaflet-maps-api' ), esc_attr( $movedo_version ), true );
			$movedo_grve_maps_data = array(
				'map_tile_url' => movedo_grve_option( 'map_tile_url', 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png' ),
				'map_tile_url_subdomains' => movedo_grve_option( 'map_tile_url_subdomains', 'abc' ),
				'map_tile_attribution' => movedo_grve_option( 'map_tile_attribution' ),
			);
		} else {

			wp_register_script( 'movedo-grve-maps-script', get_template_directory_uri() . '/js/maps.js', array( 'jquery', 'google-maps-api' ), esc_attr( $movedo_version ), true );
			$movedo_grve_maps_data = array(
				'custom_enabled' => movedo_grve_option( 'gmap_custom_enabled', '0' ),
				'water_color' => movedo_grve_option( 'gmap_water_color', '#424242' ),
				'lanscape_color' => movedo_grve_option( 'gmap_landscape_color', '#232323' ),
				'poi_color' => movedo_grve_option( 'gmap_poi_color', '#232323' ),
				'road_color' => movedo_grve_option( 'gmap_road_color', '#1a1a1a' ),
				'label_color' => movedo_grve_option( 'gmap_label_color', '#777777' ),
				'label_stroke_color' => movedo_grve_option( 'gmap_label_stroke_color', '#1a1a1a' ),
				'label_enabled' => movedo_grve_option( 'gmap_label_enabled', '0' ),
				'country_color' => movedo_grve_option( 'gmap_country_color', '#000000' ),
				'zoom_enabled' => movedo_grve_option( 'gmap_zoom_enabled', '0' ),
				'custom_code' => movedo_grve_option( 'gmap_custom_code', '[]' ),
				'gesture_handling' => movedo_grve_option( 'gmap_gesture_handling', 'auto' ),
				'type_control' => movedo_grve_option( 'gmap_type_control', '0' ),
			);
		}
		wp_localize_script( 'movedo-grve-maps-script', 'movedo_grve_maps_data', $movedo_grve_maps_data );
	}

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array( 'jquery' ), '3.3.1', false );

	$movedo_grve_fullpage = $movedo_grve_piling = 0;
	if ( is_page_template( 'page-templates/template-full-page.php' ) ) {
		$scrolling_page = movedo_grve_post_meta( '_movedo_grve_scrolling_page' );
		if( 'pilling' == $scrolling_page ) {
			$movedo_grve_piling = 1;
		} else {
			$movedo_grve_fullpage = 1;
		}
	}

	$movedo_grve_fullpage_data = array(
		'fullpage' => $movedo_grve_fullpage,
	);
	$movedo_grve_piling_data = array(
		'piling' => $movedo_grve_piling,
	);
	$movedo_grve_smoothscroll_data = array(
		'smoothscrolling' => movedo_grve_scroll_check() && !is_page_template( 'page-templates/template-full-page.php' ),
	);

	$movedo_grve_data = array(
		'quantity_buttons' => movedo_grve_option( 'product_woo_quantity_buttons', '1' ),
	);

	//Plugin Scripts
	if ( '1' == movedo_grve_option( 'combine_js', '1' ) ) {
		wp_enqueue_script( 'movedo-grve-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), esc_attr( $movedo_version ), true );

		wp_localize_script( 'movedo-grve-plugins', 'movedo_grve_fullpage_data', $movedo_grve_fullpage_data );
		wp_localize_script( 'movedo-grve-plugins', 'movedo_grve_piling_data', $movedo_grve_piling_data );
		wp_localize_script( 'movedo-grve-plugins', 'movedo_grve_smoothscroll_data', $movedo_grve_smoothscroll_data );
		wp_localize_script( 'movedo-grve-plugins', 'movedo_grve_data', $movedo_grve_data );
	} else {
		wp_enqueue_script( 'jquery-smoothscroll', get_template_directory_uri() . '/js/plugins/smoothscroll.min.js', array( 'jquery' ), '1.4.9', true );
		wp_enqueue_script( 'movedo-grve-libs', get_template_directory_uri() . '/js/plugins/grve.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'raf', get_template_directory_uri() . '/js/plugins/rAF.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/plugins/superfish.min.js', array( 'jquery' ), '1.7.9', true );
		wp_enqueue_script( 'snap-svg', get_template_directory_uri() . '/js/plugins/snap.svg.min.js', array( 'jquery' ), '0.4.1', true );
		wp_enqueue_script( 'debounce', get_template_directory_uri() . '/js/plugins/debounce.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'jquery-appear', get_template_directory_uri() . '/js/plugins/jquery.appear.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'image-zoom', get_template_directory_uri() . '/js/plugins/image-zoom.min.js', array( 'jquery' ), '2.3.0', true );
		wp_enqueue_script( 'countup', get_template_directory_uri() . '/js/plugins/countUp.min.js', array( 'jquery' ), '1.5.3', true );
		wp_enqueue_script( 'jquery-easypiechart', get_template_directory_uri() . '/js/plugins/jquery.easypiechart.min.js', array( 'jquery' ), '2.1.6', true );
		wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/js/plugins/owl.carousel.min.js', array( 'jquery' ), '2.0.0', true );
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/plugins/isotope.min.js', array( 'jquery' ), '3.0.1', true );
		wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/plugins/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/plugins/fitvids.min.js', array( 'jquery' ), '1.1.0', true );
		wp_enqueue_script( 'perfect-scrollbar', get_template_directory_uri() . '/js/plugins/perfect-scrollbar.min.js', array( 'jquery' ), '0.6.5', true );
		wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/plugins/jquery.easing.min.js', array( 'jquery' ), '1.4.2', true );
		wp_enqueue_script( 'typed', get_template_directory_uri() . '/js/plugins/typed.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'jquery-countdown', get_template_directory_uri() . '/js/plugins/jquery.countdown.min.js', array( 'jquery' ), '2.1.0', true );
		wp_enqueue_script( 'vivus', get_template_directory_uri() . '/js/plugins/vivus.min.js', array( 'jquery' ), '0.3.1', true );
		wp_enqueue_script( 'jquery-iscroll', get_template_directory_uri() . '/js/plugins/iscroll.min.js', array( 'jquery' ), '5.2.0', true );
		wp_enqueue_script( 'jquery-fullpage', get_template_directory_uri() . '/js/plugins/fullpage.min.js', array( 'jquery' ), '2.9.7', true );
		wp_enqueue_script( 'jquery-pagepiling', get_template_directory_uri() . '/js/plugins/jquery.pagepiling.min.js', array( 'jquery' ), '1.5.5', true );

		wp_localize_script( 'jquery-smoothscroll', 'movedo_grve_smoothscroll_data', $movedo_grve_smoothscroll_data );
		wp_localize_script( 'jquery-fullpage', 'movedo_grve_fullpage_data', $movedo_grve_fullpage_data );
		wp_localize_script( 'jquery-pagepiling', 'movedo_grve_piling_data', $movedo_grve_piling_data );
		wp_localize_script( 'movedo-grve-libs', 'movedo_grve_data', $movedo_grve_data );
	}

	wp_enqueue_script( 'movedo-grve-main-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), esc_attr( $movedo_version ), true );

	$movedo_grve_main_data = array(
		'siteurl' => get_template_directory_uri() ,
		'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
		'wp_gallery_popup' => movedo_grve_option( 'wp_gallery_popup', '0' ),
		'popup_spinner' => movedo_grve_option( 'popup_spinner', '1' ),
		'popup_open_speed' => movedo_grve_option( 'popup_open_speed', 'slow' ),
		'device_animations' => movedo_grve_option( 'device_animations', '0' ),
		'device_hover_single_tap' => movedo_grve_option( 'device_hover_single_tap', '0' ),
		'responsive_thershold' => movedo_grve_option( 'responsive_header_threshold', '1024' ),
		'back_to_top' => movedo_grve_option( 'back_to_top_enabled', '1' ),
		'string_back_to_top' => esc_html__( 'Back to top', 'movedo' ),
		'string_weeks' => esc_html__( 'Weeks', 'movedo' ),
		'string_days' => esc_html__( 'Days', 'movedo' ),
		'string_hours' => esc_html__( 'Hours', 'movedo' ),
		'string_minutes' => esc_html__( 'Min', 'movedo' ),
		'string_seconds' => esc_html__( 'Sec', 'movedo' ),
		'nonce_likes' => wp_create_nonce( 'movedo-grve-likes' ),
	);
	wp_localize_script( 'movedo-grve-main-script', 'movedo_grve_main_data', $movedo_grve_main_data );

	$resolution_code = "var screen_width = Math.max( screen.width, screen.height );var devicePixelRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;document.cookie = 'resolution=' + screen_width + ',' + devicePixelRatio + ';SameSite=Lax; path=/';";
	$custom_js_code = movedo_grve_option( 'custom_js' );
	if ( function_exists( 'wp_add_inline_script' ) ) {
		wp_add_inline_script( 'movedo-grve-main-script', $resolution_code );
		wp_add_inline_script( 'movedo-grve-main-script', movedo_grve_get_privacy_cookie_script() );
		if ( !empty( $custom_js_code ) ) {
			wp_add_inline_script( 'movedo-grve-main-script', $custom_js_code );
		}
	}

}
add_action( 'wp_enqueue_scripts', 'movedo_grve_frontend_scripts' );

function movedo_grve_remove_conflict_frontend_css() {
	//Deregister VC awesome fonts as older version from Theme
	if ( wp_style_is( 'vc_font_awesome_5', 'registered' ) ) {
		wp_deregister_style( 'vc_font_awesome_5' );
	}
	if ( wp_style_is( 'font-awesome', 'registered' ) ) {
		wp_deregister_style( 'font-awesome' );
		wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '6.4.2' );
	}
}
add_action( 'vc_base_register_front_css', 'movedo_grve_remove_conflict_frontend_css' );
add_action( 'elementor/frontend/after_register_styles', 'movedo_grve_remove_conflict_frontend_css' );

/**
 * Pagination functions
 */
if ( ! function_exists( 'movedo_grve_paginate_links' ) ) {
	function movedo_grve_paginate_links() {
		global $wp_query;

		$paged = 1;
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		}

		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 echo '<div class="grve-pagination grve-link-text grve-heading-color">';

			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			 echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, $paged ),
				'total'			=> $total,
				'mid_size'		=> 2,
				'type'			=> 'list',
				'prev_text'    => '<i class="grve-icon-nav-left"></i><span class="screen-reader-text">' . esc_html( 'Previous', 'movedo' ) . '</span>',
				'next_text'    => '<i class="grve-icon-nav-right"></i><span class="screen-reader-text">' . esc_html( 'Next', 'movedo' ) . '</span>',
				'add_args' => false,
			 ));
			 echo '</div>';
		}
	}
}

if ( ! function_exists( 'movedo_grve_wp_link_pages_args' ) ) {
	function movedo_grve_wp_link_pages_args( $args ) {

		$args = array(
			'before'           => '<div class="grve-pagination grve-link-text grve-heading-color"><ul><li>',
			'after'            => '</li></ul></div>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'aria_current'     => 'page',
			'next_or_number'   => 'number',
			'separator'        => '</li><li>',
			'nextpagelink'     => '<i class="grve-icon-nav-left"></i><span class="screen-reader-text">' . esc_html( 'Previous', 'movedo' ) . '</span>',
			'previouspagelink' => '<i class="grve-icon-nav-right"></i><span class="screen-reader-text">' . esc_html( 'Next', 'movedo' ) . '</span>',
			'pagelink'         => '%',
			'echo'             => 1
		);

		return $args;
	}
}
add_filter( 'wp_link_pages_args', 'movedo_grve_wp_link_pages_args' );

/**
 * Comments
 */
if ( ! function_exists( 'movedo_grve_comments' ) ) {
	function movedo_grve_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<li class="grve-comment-item grve-border">
			<!-- Comment -->
			<div id="comment-<?php comment_ID(); ?>"  <?php comment_class(); ?>>
				<div class="grve-comment-header">
					<div class="grve-author-image">
						<?php echo get_avatar( $comment, 50 ); ?>
					</div>
					<div class="grve-comment-title">
						<span class="grve-author grve-text-heading grve-h6"><?php comment_author(); ?></span>
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>" class="grve-link-text grve-comment-date grve-text-primary-1"><?php printf( ' %1$s ' . esc_html__( 'at', 'movedo' ) . ' %2$s', get_comment_date(),  get_comment_time() ); ?></a>
					</div>
				</div>
				<div class="grve-comment-content">
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p><?php esc_html_e( 'Your comment is awaiting moderation.', 'movedo' ); ?></p>
					<?php endif; ?>
					<div class="grve-comment-text"><?php comment_text(); ?></div>
					<div class="grve-reply-edit">
						<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => esc_html__( 'Reply', 'movedo' ) ) ) ); ?>
						<?php edit_comment_link( esc_html__( 'Edit', 'movedo' ), '  ', '' ); ?>
					</div>
				</div>
			</div>

		<!-- </li> is added by WordPress automatically -->
	<?php
	}
}

/**
 * Navigation links for prev/next in comments
 */
function movedo_grve_replace_reply_link_class( $output ) {
	$class = 'grve-comment-reply grve-link-text grve-heading-color grve-text-hover-primary-1';
	return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $class, $output, 1 );
}
add_filter('comment_reply_link', 'movedo_grve_replace_reply_link_class');

function movedo_grve_replace_edit_link_class( $output ) {
	$class = 'grve-comment-edit grve-link-text grve-heading-color grve-text-hover-primary-1';
	return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $class, $output, 1 );
}
add_filter('edit_comment_link', 'movedo_grve_replace_edit_link_class');


/**
 * Title Render Fallback before WordPress 4.1
 */
 if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function movedo_grve_theme_render_title() {
?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'movedo_grve_theme_render_title' );
}

/**
 * Theme identifier function
 * Used to get theme information
 */
function movedo_grve_info() {

	$movedo_grve_info = array (
		"version" => MOVEDO_GRVE_THEME_VERSION,
		"short_name" => 'movedo',
	);

	return $movedo_grve_info;
}

/**
 * Add Container
 */
add_action('the_content','movedo_grve_container_div');
add_action('movedo_grve_the_content','movedo_grve_container_div');

if ( ! function_exists( 'movedo_grve_container_div' ) ) {
	function movedo_grve_container_div( $content ){

		if( is_singular() && !has_shortcode( $content, 'vc_row') ) {
			return '<div class="grve-container">' . $content . '</div>';
		} else {
			return $content;
		}
	}

}

/**
 * Add wp_body_open function
 */
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Add max srcset
 */
if ( ! function_exists( 'movedo_grve_max_srcset_image_width' ) ) {
	function movedo_grve_max_srcset_image_width( $max_image_width, $size_array ) {
		return 1920;
	}
}
add_filter( 'max_srcset_image_width', 'movedo_grve_max_srcset_image_width', 10 , 2 );


/**
 * Add Body Class
 */
function movedo_grve_body_class( $classes ){
	global $pagenow;
	if ( 'widgets.php' == $pagenow ) {
		return $classes;
	}
	if ( defined( 'IFRAME_REQUEST' ) ) {
		return $classes;
	}
	$movedo_grve_theme_layout = 'grve-' . movedo_grve_option( 'theme_layout', 'stretched' );
	return array_merge( $classes, array( 'grve-body', $movedo_grve_theme_layout ) );
}
add_filter( 'body_class', 'movedo_grve_body_class' );

/**
 * VC Control Fix
 */
if ( ! function_exists( 'movedo_grve_vc_control_scripts' ) ) {
	function movedo_grve_vc_control_scripts() {
?>
	<script type="text/javascript">
	jQuery(document).on('click','#vc_button-update', function(e){
		if ( document.getElementById('vc_inline-frame') !== null && typeof document.getElementById('vc_inline-frame').contentWindow.GRVE.isotope.init === 'function' ) {
			document.getElementById('vc_inline-frame').contentWindow.GRVE.isotope.init();
		}
	});
	jQuery(document).on('click','.vc_ui-button[data-vc-ui-element="button-save"]', function(e){
		setTimeout(function() {
			if ( document.getElementById('vc_inline-frame') !== null && typeof document.getElementById('vc_inline-frame').contentWindow.GRVE.isotope.init === 'function' ) {
				document.getElementById('vc_inline-frame').contentWindow.GRVE.isotope.init();
			}
		}, 2000);
	});
	</script>
<?php
	}
}
add_action('admin_print_footer_scripts', 'movedo_grve_vc_control_scripts');

/**
 * Theme Migration
 */
if ( ! function_exists( 'movedo_grve_theme_migration' ) ) {
	function movedo_grve_theme_migration() {
		$movedo_grve_theme_migration = get_option( 'movedo_grve_theme_migration' );

		if ( empty( $movedo_grve_theme_migration ) || version_compare( $movedo_grve_theme_migration, '3.0', '<' ) ) {
			$ext_options = get_option( 'movedo_grve_ext_options' );
			$head_code = movedo_grve_array_value( $ext_options, 'head_code' );
			$old_code = movedo_grve_option( 'tracking_code' );
			if ( !empty( $old_code ) && empty( $head_code ) ) {
				if ( empty( $ext_options ) ) {
					$ext_options = array();
				}
				$ext_options['head_code'] = $old_code;
				update_option( 'movedo_grve_ext_options', $ext_options );
			}
			update_option( 'movedo_grve_theme_migration', '3.0' );
		}
	}
}
add_action( 'after_setup_theme', 'movedo_grve_theme_migration' );

//Omit closing PHP tag to avoid accidental whitespace output errors.
