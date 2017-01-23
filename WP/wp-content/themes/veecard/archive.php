<?php get_header(); ?>

		
		<div class="column-left">
			
			<h1>
				<?php if (is_category()) { ?>
						<?php _e("Posts Categorized", "site5framework"); ?> / <span><?php single_cat_title(); ?></span> 
				<?php } elseif (is_tag()) { ?> 
						<?php _e("Posts Tagged", "site5framework"); ?> / <span><?php single_cat_title(); ?></span>
				<?php } elseif (is_author()) { ?>
						<?php _e("Posts By", "site5framework"); ?> / <span><?php the_author_meta('display_name', $post->post_author) ?> </span> 
				<?php } elseif (is_day()) { ?>
						<?php _e("Daily Archives", "site5framework"); ?> / <span><?php the_time('l, F j, Y'); ?></span>
				<?php } elseif (is_month()) { ?>
				    	<?php _e("Monthly Archives", "site5framework"); ?> / <span><?php the_time('F Y'); ?></span>
				<?php } elseif (is_year()) { ?>
				    	<?php _e("Yearly Archives", "site5framework"); ?> / <span><?php the_time('Y'); ?></span> 
				<?php } elseif (is_search()) { ?>
				    	<?php _e("Search Results", "site5framework"); ?> / <span><?php echo esc_attr(get_search_query()); ?></span> 
				<?php } else { ?>
						<?php the_title() ?>
				<?php } ?>
			</h1>
			
			<?php
			// WP 3.0 PAGED BUG FIX
			if ( get_query_var('paged') )
			$paged = get_query_var('paged');
			elseif ( get_query_var('page') )
			$paged = get_query_var('page');
			else
			$paged = 1;

			
			
			$args = array(
			'post_type' => 'post',
			'paged' => $paged );
			
			global $wp_query;
			$args = array_merge( $wp_query->query_vars, $args );
			query_posts($args);
			?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

				<?php if(has_post_thumbnail()): the_post_thumbnail('thumbnail', array('class'=>'blog-thumb')); ?><?php endif; ?>

				<header>
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<div class="meta">
						<?php echo get_the_date(); ?> | <?php the_category(', '); ?> | <?php _e('by','site5framework') ?> <?php the_author(); ?> 
					</div>
				</header>

				<?php the_excerpt(); ?>

			</article>

			<?php endwhile; ?>


			<!-- begin #pagination -->
				<?php if (function_exists("emm_paginate")) { 
						emm_paginate();  
					 } else { ?>
				<div class="navigation">
			        <div class="alignleft"><?php next_posts_link('Older') ?></div>
			        <div class="alignright"><?php previous_posts_link('Newer') ?></div>
			    </div>
		    <?php } ?>
		    <!-- end #pagination -->

			<?php endif;?>

			<?php wp_reset_query(); ?>

		</div>

		<div class="column-right">
		<?php get_sidebar(); ?>
		</div>

<?php get_footer(); ?>