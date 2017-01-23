<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Magnum_Opus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function magnumopus_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class if the page is using the portfolio or front page template.
	if ( is_page_template( 'template-parts/template-portfolio.php' ) || is_page_template( 'template-parts/template-front-page.php' ) || is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
		$classes[] = 'front-page-or-portfolio';
	}

	// Adds a class if page template doesn't display the sidebar.
	if ( ! is_active_sidebar( 'sidebar-2') || is_page_template( 'template-parts/template-portfolio.php' ) || is_page_template( 'template-parts/template-front-page.php' ) || is_page_template( 'template-parts/template-full-width.php' ) || is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
		$classes[] = 'no-sidebar';
	}
	else {
		$classes[] = 'has-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'magnumopus_body_classes' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @see wp_add_inline_style()
 */
function magnumopus_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevThumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'magnumopus-navigation' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevThumb[0] ) . '); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextThumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'magnumopus-navigation' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextThumb[0] ) . '); }
		';
	}

	wp_add_inline_style( 'magnumopus-style', $css );
}
add_action( 'wp_enqueue_scripts', 'magnumopus_post_nav_background' );

/**
 * Turn a multi-dimensional array into a simple flat array and remove duplicates.
 *
 * @link http://stackoverflow.com/a/14972714/4429450
 */
function flatten_array_and_remove_duplicates( $array ) {
	$result = array();
	foreach ($array as $key => $value) {
		if (is_array($value)){ $result = array_merge($result, flatten_array_and_remove_duplicates($value));}
		else {$result[$key] = $value;}
	}

	// Remove duplicate entries.
	$return = array_unique($result);

	return $return;
}