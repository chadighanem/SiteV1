<?php
/**
 * MyResume functions and definitions
 *
 * @package MyResume
 */
 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'myresume_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function myresume_setup() {
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'myresume_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // myresume_setup
add_action( 'after_setup_theme', 'myresume_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function myresume_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'myresume' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'myresume_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function myresume_scripts() {
	wp_enqueue_style( 'myresume-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'dashicons' );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'myresume_scripts' );

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

//for skills star rating
function myresume_skill_stars ( $myresume_skill_star_rating) {
$myresume_ssr = esc_html($myresume_skill_star_rating);

if($myresume_ssr == 5) {
echo '<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>';
}
elseif($myresume_ssr == 4.5) {
echo '<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-half"></span>';
}
elseif($myresume_ssr == 4) {
echo '<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-empty"></span>';
}
elseif($myresume_ssr == 3.5) {
echo '<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-half"></span>
<span class="dashicons dashicons-star-empty"></span>';
}
elseif($myresume_ssr == 3) {
echo '<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>';
}
elseif($myresume_ssr == 2.5) {
echo '<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-half"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>';
}

elseif($myresume_ssr == 2) {
echo '<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>';
}

elseif($myresume_ssr == 1.5) {
echo '<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-half"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>';
}

elseif($myresume_ssr == 1) {
echo '<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>';
}

else {
echo '<span class="dashicons dashicons-star-half"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>
<span class="dashicons dashicons-star-empty"></span>';
}
}

