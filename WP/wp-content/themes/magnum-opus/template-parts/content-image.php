<?php
/**
 * Template part for displaying image post format posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magnum_Opus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php magnumopus_post_thumbnail(); ?>

	<?php if ( is_single() ) { ?>
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav" aria-hidden="true">&rarr;</span>', 'magnum-opus' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magnum-opus' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php } ?>

	<footer class="entry-footer">
		<?php magnumopus_entry_footer() ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
