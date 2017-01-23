<?php
/* The part for displaying testimonial items
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
					$posts_per_page = get_theme_mod( 'magnumopus_testimonial_limit', 3 );
				else :
					$posts_per_page = get_option( 'jetpack_testimonial_posts_per_page', 10 );
				endif;
				
				$args = array(
					'post_type'      => 'jetpack-testimonial',
					'posts_per_page' => $posts_per_page,
					'paged'          => $paged,
				);
				$testimonial_query = new WP_Query ( $args );

			if ( post_type_exists( 'jetpack-testimonial' ) && $testimonial_query -> have_posts() ) :
			?>

				<?php $testimonials_page = get_theme_mod( 'jetpack_testimonials' ); ?>

				<div class="testimonial-wrapper" <?php magnumopus_front_page_optional_images( $testimonials_page['featured-image'] ); ?>>
					<div class="testimonial-overlay">
						<div class="testimonial-inner container">

							<?php if ( ! empty( $testimonials_page['page-title'] ) ) : ?>
								<h2 class="testimonial-section-title"><?php echo esc_html( $testimonials_page['page-title'] ); ?></h2>
							<?php endif; ?>

							<?php if ( ! empty( $testimonials_page['page-content'] ) ) : ?>
								<div class="testimonial-section-description"><?php echo esc_html( $testimonials_page['page-content'] ); ?></div>
							<?php endif; ?>

							<div class="testimonial-container">

								<?php while ( $testimonial_query -> have_posts() ) : $testimonial_query -> the_post(); ?>

									<?php get_template_part( 'template-parts/content', 'testimonial' ); ?>

								<?php endwhile; ?>

							</div><!-- .testimonial-container -->

						</div><!-- .testimonial-inner -->
					</div><!-- .testimonial-overlay -->
				</div><!-- .testimonial-wrapper -->

				<?php
					wp_reset_postdata();
				?>

			<?php else : ?>

				<section class="no-results not-found no-testimonials">
					<div class="container">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'No testimonial items to display', 'magnum-opus' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<?php if ( current_user_can( 'publish_posts' ) ) : ?>

								<p><?php printf( esc_html__( 'Ready to publish your first testimonial? <a href="%1$s">Get started here</a>.', 'magnum-opus' ), esc_url( admin_url( 'post-new.php?post_type=jetpack-testimonial' ) ) ); ?></p>

							<?php endif; ?>
						</div><!-- .page-content -->
					</div><!-- .container -->
				</section><!-- .no-results -->

			<?php endif; ?>
