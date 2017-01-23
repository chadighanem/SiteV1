<?php
/**
 * Template part for displaying posts with the Aside post format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magnum_Opus
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="special-content">
		<?php	
			// Fetch post content
			$content = get_post_field( 'post_content', get_the_ID() );

			// Apply filters
			$content = apply_filters('the_content', $content);

			// Get content parts
			$content_parts = get_extended( $content );
			
			// Output part before <!--more--> tag
			echo $content_parts['main'];
		?>
	</div><!-- .special-content -->

	<?php if ( is_single() ) : ?>
		<div class="entry-content">
			<?php
				// Output part after <!--more--> tag
				echo $content_parts['extended'];
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magnum-opus' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php magnumopus_entry_footer() ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
