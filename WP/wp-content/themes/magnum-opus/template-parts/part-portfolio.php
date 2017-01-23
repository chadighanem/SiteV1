<?php
/* The part for displaying portfolio items
 * 
 * @package Magnum_Opus
 */
 ?>

 			<?php	
				if ( get_query_var( 'paged' ) ) :
					$paged = get_query_var( 'paged' );
				elseif ( get_query_var( 'page' ) ) :
					$paged = get_query_var( 'page' );
				else :
					$paged = 1;
				endif;

				if ( is_page_template( 'template-parts/template-front-page.php' ) ) :
					$posts_per_page = get_theme_mod( 'magnumopus_portfolio_limit', 9 );
				else :
					$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', 18 );
				endif;

				if ( is_tax( 'jetpack-portfolio-type' ) ) {
					$cat_id = get_queried_object()->term_id;
					$args = array(
						'post_type'			=> 'jetpack-portfolio',
						'posts_per_page'	=> $posts_per_page,
						'paged'				=> $paged,
						'tax_query'			=> array(
							array(
								'taxonomy'		=> 'jetpack-portfolio-type',
								'field'			=> 'term_id',
								'terms'			=> $cat_id,
							)
						)
					);
				}

				elseif ( is_tax( 'jetpack-portfolio-tag' ) ) {
					$tag_id = get_queried_object()->term_id;
					$args = array(
						'post_type'			=> 'jetpack-portfolio',
						'posts_per_page'	=> $posts_per_page,
						'paged'				=> $paged,
						'tax_query'			=> array(
							array(
								'taxonomy'		=> 'jetpack-portfolio-tag',
								'field'			=> 'term_id',
								'terms'			=> $tag_id,
							)
						)
					);
				}

				else {
					$args = array(
						'post_type'      => 'jetpack-portfolio',
						'posts_per_page' => $posts_per_page,
						'paged'          => $paged,
					);
				}

				$project_query = new WP_Query ( $args );

				// Pagination fix (Part 1/2)
				if ( ! is_page_template('template-parts/template-front-page.php') ) {
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $project_query;
				}

				if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :
			?>
					<?php if ( ! is_tax( 'jetpack-portfolio-type' ) && ! is_tax( 'jetpack-portfolio-tag' ) ) : ?>

						<?php while ( $project_query -> have_posts() ) : $project_query -> the_post(); ?>

							<?php 
								// Get the terms for the filter and store it in an array.
								$argss = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'slugs');
								$terms[] = wp_get_post_terms( $post->ID, 'jetpack-portfolio-type', $argss );

								// Get the names for the filter and store it in an array.
								$argss = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'names');
								$names[] = wp_get_post_terms( $post->ID, 'jetpack-portfolio-type', $argss );
							?>

						<?php endwhile; ?>

						<?php 
							$filter_terms = flatten_array_and_remove_duplicates( $terms );
							$filter_names = flatten_array_and_remove_duplicates( $names );
						?>

						<div class="portfolio-filter">
							<div class="container">
								<button class="filter-toggle" aria-controls="filter" aria-expanded="false">
									<span class="filter-toggle-text"><?php esc_html_e( 'Filter', 'magnum-opus' ); ?></span>
									<span class="toggle-lines" aria-hidden="true"></span>
								</button>

								<ul  id="hidden-filter" class="container" style="display:none;">
									<li id="filter--all" class="filter active" data-filter="*"><?php _e( 'View All', 'magnum-opus' ) ?></li>
									<?php 
										foreach ( $filter_terms as $index => $term ) {
											echo '<li class="filter" data-filter=".'. esc_attr( $term ) .'">' . esc_html( $filter_names[$index] ) .'</li>';
										}
									?>
								</ul>
							</div>
						</div>

						<?php rewind_posts(); ?>

					<?php endif; // jetpack_portfolio_type && jetpack__portfolio_tag ?>

				<div class="portfolio-wrapper">
					<div class="gutter-sizer"></div>

				<?php while ( $project_query -> have_posts() ) : $project_query -> the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'portfolio' ); ?>

				<?php endwhile; ?>

				</div><!-- .portfolio-wrapper -->

				<?php
					wp_reset_postdata();
				?>

				<?php // Pagination fix (Part 2/2)
					if ( ! is_page_template('template-parts/template-front-page.php') && ( get_next_posts_link() || get_previous_posts_link() ) ) { ?>
						
						<div class="portfolio-pagination container">

							<?php 
							// Custom query loop pagination
							next_posts_link( esc_html__( 'Older Posts', 'magnum-opus' ), $project_query->max_num_pages );
							previous_posts_link( esc_html__( 'Newer Posts', 'magnum-opus' ) );

							// Reset main query object
							$wp_query = NULL;
							$wp_query = $temp_query; ?>

						</div><!-- .portfolio-pagination -->

					<?php 
					}
				?>

			<?php else : ?>

				<section class="no-results not-found no-projects">
					<div class="container">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'No projects to display', 'magnum-opus' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<?php if ( current_user_can( 'publish_posts' ) ) : ?>

								<p><?php printf( esc_html__( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', 'magnum-opus' ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

							<?php endif; ?>
						</div><!-- .page-content -->
					</div><!-- .container -->
				</section><!-- .no-results -->

			<?php endif; ?>
