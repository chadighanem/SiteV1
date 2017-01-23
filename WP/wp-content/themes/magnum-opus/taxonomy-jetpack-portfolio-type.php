<?php
/**
 * The template for displaying jetpack portfolio taxonomy pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magnum_Opus
 */

get_header(); ?>

	<div id="primary" class="content-area portfolio">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'template-parts/part-portfolio' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
