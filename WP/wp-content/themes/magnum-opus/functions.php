<?php
/**
 * Magnum Opus functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Magnum_Opus
 */

if ( ! function_exists( 'magnumopus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function magnumopus_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Magnum Opus, use a find and replace
	 * to change 'magnum-opus' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'magnum-opus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Add theme support for custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo/
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 75,
		'width'       => 175,
		'flex-width' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 700, 9999, false );
	add_image_size( 'magnumopus-featured-img', 1140, 600, true );
	add_image_size( 'magnumopus-portfolio-img', 600, 600, true );
	add_image_size( 'magnumopus-navigation', 700, 160, true );
	add_image_size( 'magnumopus-full-width-thumbnail', 1140, 9999, false );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'	=> esc_html__( 'Primary', 'magnum-opus' ),
		'social'	=> esc_html__( 'Social Links', 'magnum-opus' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'magnumopus_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'editor-style.css', magnumopus_fonts_url() ) );
	
}
endif;
add_action( 'after_setup_theme', 'magnumopus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function magnumopus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'magnumopus_content_width', 700 );
}
add_action( 'after_setup_theme', 'magnumopus_content_width', 0 );

/**
 * Adjust content_width value for full width page template.
 *
 * @since Magnum_Opus 1.0.0
 */
function magnumopus_full_width_page_content_width() {
	if ( is_page_template( 'template-parts/template-full-width.php' ) ) {	
		$GLOBALS['content_width'] = apply_filters( 'magnumopus_full_width_page_content_width', 1140 );
	}
}
add_action( 'template_redirect', 'magnumopus_full_width_page_content_width' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magnumopus_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'magnum-opus' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets to the widget area in the footer.', 'magnum-opus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'magnum-opus' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'This widget area will be displayed in the sidebar.', 'magnum-opus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'magnumopus_widgets_init' );

if ( ! function_exists( 'magnumopus_fonts_url' ) ) :
/**
 * Register Google fonts for Myth.
 *
 * @since Magnum_Opus 1.0.0
 *
 * @return string Google fonts URL for the theme.
 */
function magnumopus_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Roboto, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'magnum-opus' ) ) {
		$fonts[] = 'Roboto:400,700,400italic,700italic';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Roboto Slab, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'magnum-opus' ) ) {
		$fonts[] = 'Roboto Slab:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function magnumopus_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'magnumopus-fonts', magnumopus_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Load the theme main stylesheet.
	wp_enqueue_style( 'magnumopus-style', get_stylesheet_uri() );

	// Load the theme custom script file.
	wp_enqueue_script( 'magnumopus-script', get_template_directory_uri() . '/js/magnumopus.js', array( 'jquery' ), '20160426', true );

	// Load the jQuery effects file.
	wp_enqueue_script( 'jquery-effects-core' );

	// Load the skip-link-focus script file.
	wp_enqueue_script( 'magnumopus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// Load the javascript file for comments if applicable.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Only load the Isotope script file on portfolio pages.
	if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) || is_page_template( 'template-parts/template-portfolio.php' ) || is_page_template( 'template-parts/template-front-page.php' ) ) {
		wp_enqueue_script( 'isotope-script', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'magnumopus_scripts' );

/**
 * Add search toggle to the primary menu.
 */
function magnumopus_add_search_toggle ( $items, $args ) {
	if ( $args->theme_location == 'primary') {
		$items .= '<li id="search-toggle" class="menu-item"><a href="#"><span class="screen-reader-text">' . __( 'Search Toggle', 'magnum-opus' ) . '</span></a></li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'magnumopus_add_search_toggle', 10, 2 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
