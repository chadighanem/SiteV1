<?php
/**
 * Template part for displaying portfolio posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magnum_Opus
 */
?>

<?php
	// Get Jetpack Portfolio taxonomy terms for portfolio filtering
	$terms = get_the_terms( $post->ID, 'jetpack-portfolio-type' );

	if ( $terms && ! is_wp_error( $terms ) ) : 

		$filtering_links = array();

		foreach ( $terms as $term ) {
			$filtering_links[] = $term->slug;
		}

		// Add "portfolio-item" to the array.
		array_push( $filtering_links, "portfolio-item");

	endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $filtering_links ); ?> <?php magnumopus_portfolio_image(); ?>>
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="portfolio-inner overlay">
		<header class="entry-header">
			<?php the_title( '<h2 class="portfolio-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</a>
</article><!-- #post-## -->
