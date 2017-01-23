<?php
/*
Template Name: Showcase
*/
get_header(); ?>

	<article>
		<header>
			<h1><?php echo get_the_title(of_get_option('veecard_portfolio_page')); ?> <?php if(single_cat_title("", false) !='') { ?> / <span><?php single_cat_title(); ?></span> <?php } ?></h1>
		</header>
			<section>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php //the_content(); ?>
			<?php endwhile; endif; ?>


			<!-- gallery categories -->
			<ul id="gallerycat" class="filterable clearfix" data-option-key="filter">
                <li class="active"><a href="javascript:void(0)" data-value="all" data-type="all" class="all" data-option-value="*"><?php _e('all', 'site5framework'); ?></a></li>
                <?php $categories = get_categories('taxonomy=portfoliocat&title_li='); foreach ($categories as $category){ ?>
                <li><a href="<?php echo get_term_link($category->slug, 'portfoliocat') ?>" class="<?php echo $category->category_nicename;?>" data-type="<?php echo $category->category_nicename;?>" data-option-value=".<?php echo $category->category_nicename;?>"><?php echo $category->name;?></a></li>
                <?php }?>
			</ul>
			<!-- end gallery categories -->


			<div id="gallery">
				<ul class="gallery clearfix">
			<?php
				/*
				if ( get_query_var('paged') )
				$paged = get_query_var('paged');
				elseif ( get_query_var('page') )
				$paged = get_query_var('page');
				else
				$paged = 1;

				$args = array(
				'post_type' => 'portfolio',
				'paged' => $paged );
				query_posts($args);

				*/

				global $post;
							$term = get_query_var('term');
       						$tax = get_query_var('taxonomy');
							$args=array('post_type'=> 'portfolio','post_status'=> 'publish', 'orderby'=> 'menu_order', 'caller_get_posts'=>1, 'paged'=>$paged, 'posts_per_page'=>9);
							$taxargs = array($tax=>$term);
							if($term!='' && $tax!='') { $args  = array_merge($args, $taxargs); }


				query_posts($args);
			?>

     		<?php if (have_posts()) : $count = 0; ?>
			<?php while (have_posts()) : the_post(); $count++; global $post; $taxo = wp_get_object_terms( get_the_ID(), 'portfoliocat');?>

				<!-- gallery item -->

				<li data-type="<?php foreach ($taxo as $taxx) { echo strtolower(preg_replace('/\s+/', '-', $taxx->slug)). ' '; } ?>" data-id="id-<?php the_ID(); ?>" class="view <?php foreach ($taxo as $taxx) { echo strtolower(preg_replace('/\s+/', '-', $taxx->slug)). ' '; } ?>">
                    <?php
                    	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-item-small','portfolio-item-small' );
                    	$large = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false);
						if(has_post_thumbnail()): echo '<img src="'.$thumbnail[0].'" alt="'.get_the_title().'"/>'; else: ?><img src="<?php bloginfo('template_url'); ?>/images/gallery_sample.jpg" alt="portfolio" />

					<?php endif; ?>
                    <div class="mask">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <a class="info" href="<?php echo $large[0] ?>" data-rel="prettyPhoto"><?php _e('+','site5framework') ?></a>
                    </div>
                </li>

                <!-- end gallery item -->

			<?php endwhile; ?>
				 </ul>
			</div>

			</section>

			<!-- #pagination -->
					<?php if (function_exists("emm_paginate")) { emm_paginate(); } ?>
			<!-- end #pagination -->

		</article>
		<?php endif; wp_reset_query();?>

<?php get_footer(); ?>