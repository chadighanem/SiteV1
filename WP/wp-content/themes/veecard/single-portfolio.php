<?php get_header(); ?>

		<article>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			
			<h1><?php the_title(); ?></h1>
			

			<div class="showcase-image">
			<?php
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
				if(has_post_thumbnail()): echo '<img src="'.$thumbnail[0].'"/>'; else: ?>
			<?php endif; ?>
			</div>

			<div class="portfolio_desc">
				<?php the_content(); ?>
			</div>

			<?php endwhile; ?>

			<div class="navigation">
  				<div class="alignright"><?php next_post_link( '%link', '%title &raquo;' ); ?></div>
  				<div class="alignleft"><?php previous_post_link( '%link', '&laquo; %title' ); ?></div>
		    </div>

			<?php endif;?>

		</article>

<?php get_footer(); ?>