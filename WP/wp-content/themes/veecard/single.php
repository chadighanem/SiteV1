<?php get_header(); ?>

		<article>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header>
				<h1><?php the_title(); ?></h1>

			<div class="meta"><?php echo get_the_date(); ?>, <?php _e('by','site5framework') ?> <?php the_author(); ?>, <?php _e('category','site5framework') ?> <?php the_category(', '); ?></div>

			</header>

			<?php the_content(); ?>

				 <div class="navigation clearfix">
	  				<div class="alignright"><?php next_post_link( '%link', '%title &raquo;' ); ?></div>
	  				<div class="alignleft"><?php previous_post_link( '%link', '&laquo; %title' ); ?></div>
			     </div>

		     </div>

			<?php endwhile; ?>

			<?php comments_template(); ?>

			<?php endif;?>

		</article>

<?php get_footer(); ?>