<?php
/* The part for displaying the post title or hero section.
 * 
 * @package Magnum_Opus
 */
?>

<?php if ( is_page_template( 'template-parts/template-front-page.php' ) ) : ?>

	<?php while ( have_posts() ) : the_post();
		// Fetch post content.
		$content = get_post_field( 'post_content', get_the_ID() );

		// Apply filters.
		$content = apply_filters('the_content', $content);

		// Get content parts.
		$content_parts = get_extended( $content );

	endwhile; // End of the loop. ?>

	<div id="hero" class="hero-area" <?php magnumopus_featured_image(); ?>>
		<div class="hero-overlay">
			<div class="container">
				<?php // Output part before <!--more--> tag.
					echo $content_parts['main']; ?>
			</div>
		</div>
	</div>

<?php elseif ( is_home() ) : ?>

	<div class="blog-header" <?php magnumopus_featured_image(); ?>>
		<div class="header-overlay">
			<div class="container">
				<?php if ( ! is_front_page() ) : ?>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				<?php endif; ?>

				<?php if ( get_option( 'page_for_posts' ) ) : ?>
					<?php $posts_page = get_post( get_option( 'page_for_posts' ) );
					echo apply_filters( 'the_content', $posts_page->post_content ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- .blog-header -->

<?php elseif ( is_page() ) : ?>

	<?php while ( have_posts() ) : the_post();
		// Fetch post content.
		$content = get_post_field( 'post_content', get_the_ID() );

		// Apply filters.
		$content = apply_filters('the_content', $content);

		// Get content parts.
		$content_parts = get_extended( $content );

	endwhile; // End of the loop. ?>

	<div class="single-header" <?php magnumopus_featured_image(); ?>>
		<div class="header-overlay">
			<div class="container">
				<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>
				<?php // Output part before <!--more--> tag. But only if there is content after <!--more--> tag. ?>
				<?php if ( ! empty( $content_parts['extended'] ) ) :
					echo $content_parts['main']; ?>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- .single-header -->

<?php elseif ( is_singular( 'jetpack-portfolio' ) && post_type_exists( 'jetpack-portfolio' ) ) : ?>

	<div class="single-header" <?php magnumopus_featured_image(); ?>>
		<div class="header-overlay">
			<div class="container">
				<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>
				<?php magnumopus_portfolio_categories(); ?>
			</div>
		</div>
	</div><!-- .single-header -->

<?php elseif ( is_singular() && has_post_format( 'link' ) ) : ?>

	<div class="single-header link-header" <?php magnumopus_featured_image(); ?>>
		<div class="header-overlay">
			<div class="container">
				<?php the_title( '<h1 class="single-title"><a href="' . esc_url( magnumopus_get_link_url() ) . '">', '</a></h1>' ); ?>
				<div class="entry-meta">
					<?php magnumopus_entry_meta(); ?>
				</div><!-- .entry-meta -->
			</div>
		</div>
	</div><!-- .single-header -->

<?php elseif ( is_singular() ) : ?>

	<div class="single-header" <?php magnumopus_featured_image(); ?>>
		<div class="header-overlay">
			<div class="container">
				<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>
				<div class="entry-meta">
					<?php magnumopus_entry_meta(); ?>
				</div><!-- .entry-meta -->
			</div>
		</div>
	</div><!-- .single-header -->

<?php elseif ( is_archive() ) : ?>

	<div class="archive-header">
		<div class="header-overlay">
			<div class="container">
				<?php
					the_archive_title( '<h1 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</div>
		</div>
	</div><!-- .archive-header -->

<?php elseif ( is_search() ) : ?>

	<div class="search-header">
		<div class="header-overlay">
			<div class="container">
				<h1 class="search-result-title"><?php printf( esc_html__( 'Search Results for: %s', 'magnum-opus' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</div>
		</div>
	</div><!-- .search-header -->

<?php else : ?>

	<div class="not-found-header">
		<div class="header-overlay">
			<div class="container">
				<h1 class="not-found-header"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'magnum-opus' ); ?></h1>
			</div>
		</div>
	</div><!-- .search-header -->

<?php endif; ?>
