<?php

// Child theme (Do not remove!)
define( 'CHILD_THEME_NAME', 'Mai Lifestyle Pro' );
define( 'CHILD_THEME_URL', 'https://maipro.io/' );
define( 'CHILD_THEME_VERSION', '1.0.2' );

// Support the Mai Pro Engine (Do not remove!)
add_theme_support( 'mai-pro-engine' );

/**
 * Mai Pro dependencies (Do not remove!).
 * This is required for the theme to function properly.
 */
foreach ( glob( dirname( __FILE__ ) . '/includes/dependencies/*.php' ) as $file ) { include $file; }
WP_Dependency_Installer::instance()->run( dirname( __FILE__ ) . '/includes/dependencies' );

// Don't do anything else if the Mai Pro Engine plugin is not active.
if ( ! class_exists( 'Mai_Pro_Engine' ) ) {
	return;
}

// Include all php files in the /includes/ directory.
foreach ( glob( dirname( __FILE__ ) . '/includes/*.php' ) as $file ) { include $file; }


/**********************************
 * Add your customizations below! *
 **********************************/


// Enqueue CSS files
add_action( 'wp_enqueue_scripts', 'maip_enqueue_fonts' );
function maip_enqueue_fonts() {
	wp_enqueue_style( 'maip-google-fonts', '//fonts.googleapis.com/css?family=Lato:400,400i,700|Open+Sans:400,400i,700', array(), CHILD_THEME_VERSION );
}

// Customize the site footer text
add_filter( 'genesis_footer_creds_text', 'maip_site_footer_text' );
function maip_site_footer_text( $text ) {
	$url  = 'https://maipro.io/';
	$name = 'Mai Pro';
	return sprintf( 'Copyright &copy; %s <a href="%s" title="%s">%s</a> &middot; All Rights Reserved &middot; Powered by <a rel="nofollow" href="%s">%s</a>',
		date('Y'),
		get_bloginfo('url'),
		get_bloginfo('name'),
		get_bloginfo('name'),
		$url,
		$name
	);
}
