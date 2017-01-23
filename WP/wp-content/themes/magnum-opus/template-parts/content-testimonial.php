<?php
/**
 * Template part for displaying testimonials.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magnum_Opus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php magnumopus_post_thumbnail(); ?>

	<header class="testimonial-header">
		<?php the_title( '<h2 class="testimonial-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="testimonial-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav" aria-hidden="true">&rarr;</span>', 'magnum-opus' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
