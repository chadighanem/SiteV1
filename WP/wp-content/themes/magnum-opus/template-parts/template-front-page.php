<?php
/**
 * Template Name: Front Page
 *
 * The template for displaying the front page.
 */

get_header(); ?>

	<div id="primary" class="content-area front-page">

		<?php get_template_part( 'template-parts/part-portfolio' ); ?>

		<?php magnumopus_portfolio_url() ?>

		<?php while ( have_posts() ) : the_post();
			// Fetch post content.
			$content = get_post_field( 'post_content', get_the_ID() );

			// Apply filters.
			$content = apply_filters('the_content', $content);

			// Get content parts.
			$content_parts = get_extended( $content );

			// Get the content after the <!--more--> tag.
			$content_after_more = $content_parts['extended'];

		endwhile; // End of the loop. ?>

		<?php
			if ( ! empty( $content_after_more ) ) : ?>
				<?php $thumbnail_id = get_theme_mod( 'magnumopus_sidekick_featured_image' ); ?>
				<div id="sidekick" class="sidekick-area" <?php magnumopus_front_page_optional_images( $thumbnail_id ); ?>>
					<div class="sidekick-overlay">
						<div class="container">
							<?php echo $content_after_more; ?>
						</div>
					</div>
				</div>
			<?php 
			endif;
		?>

		<?php get_template_part( 'template-parts/part-featured' ); ?>

		<?php magnumopus_blog_url() ?>

		<?php get_template_part( 'template-parts/part-testimonial' ); ?>

	</div><!-- #primary -->

<?php
get_footer();
