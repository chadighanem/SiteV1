<?php
/* The part for displaying the featured or latest posts.
 * 
 * @package Magnum_Opus
 */

$featured = magnumopus_get_featured_posts();

if ( magnumopus_has_featured_posts( 1 ) ) : ?>

	<div id="featured" class="featured-area">
		<?php
		foreach ( $featured as $post ) :
			setup_postdata( $post );

			if ( has_post_thumbnail() ) : ?>

				<div class="featured-item" <?php magnumopus_featured_image(); ?>>
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="featured-inner overlay">
						<div class="container">
							<?php the_title( '<div class="featured-header"><h2 class="featured-title">', '</h2></div>' ); ?>
							<?php magnumopus_featured_post_meta(); ?>
						</div>
					</a>
				</div>

		<?php
			endif;
		endforeach;
		wp_reset_postdata();
		?>
	</div>

<?php else : ?>

	<div class="no-results not-found no-featured-items">
		<div class="container">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'No featured posts to display', 'magnum-opus' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<?php if ( current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( wp_kses( __( 'It seems that there are no featured posts to display. <a href="%1$s">Edit a post. And give it a "featured" tag.</a>', 'magnum-opus' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit.php' ) ) ); ?></p>

				<?php endif; ?>
			</div><!-- .page-content -->
		</div><!-- .container -->
	</div>

<?php endif; ?>