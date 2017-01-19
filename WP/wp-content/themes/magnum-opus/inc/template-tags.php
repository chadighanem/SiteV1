<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Magnum_Opus
 */

if ( ! function_exists( 'magnumopus_time_string' ) ) :
/**
 * Returns the current post-date/time.
 */
function magnumopus_time_string() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	return $time_string;
}
endif;

if ( ! function_exists( 'magnumopus_portfolio_categories' ) ) :
/**
 * Prints HTML with the categories of the current portfolio item.
 */
function magnumopus_portfolio_categories() {
	if ( ! 'jetpack-portfolio' == get_post_type() ) {
		return;
	}

	$cat_list = the_terms( $post->ID, 'jetpack-portfolio-type', '', '' );
	if ( $cat_list ) {
		echo '<span class="cat-links">';
		echo $cat_list;
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'magnumopus_blog_post_footer' ) ) :
/**
 * Prints post footer with author and date.
 */
function magnumopus_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() &&  ! is_singular() ) {
		
		if ( is_sticky() ) {
			$format = esc_html__( 'Sticky', 'magnum-opus' );
		}
		elseif ( has_post_format( 'quote' ) ) {
			$format = esc_html__( 'Quote', 'magnum-opus' );
		}
		elseif ( has_post_format( 'link' ) ) {
			$format = esc_html__( 'Link', 'magnum-opus' );
		}
		elseif ( has_post_format( 'aside' ) ) {
			$format = esc_html__( 'Aside', 'magnum-opus' );
		}
		elseif ( has_post_format( 'image' ) ) {
			$format = esc_html__( 'Image', 'magnum-opus' );
		}
		elseif ( has_post_format( 'video' ) ) {
			$format = esc_html__( 'Video', 'magnum-opus' );
		}
		elseif ( has_post_format( 'gallery' ) ) {
			$format = esc_html__( 'Gallery', 'magnum-opus' );
		}
		elseif ( has_post_format( 'audio' ) ) {
			$format = esc_html__( 'Audio', 'magnum-opus' );
		}

		if ( ! empty( $format ) ) {
			echo '<span class="format"> ' . $format . '</span><span class="sep"> | </span>';
		}

		$time_string = magnumopus_time_string();

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

		echo '<span class="byline"> ' . $byline . '</span><span class="sep"> | </span><span class="posted-on">' . $posted_on . '</span>';
	}

	// Echo the tags list for portfolio items.
	elseif ( 'jetpack-portfolio' == get_post_type() ) {
		$tags_list = the_terms( $post->ID, 'jetpack-portfolio-tag', 'Tags: ', esc_html__( ', ', 'magnum-opus' ) );
		if ( $tags_list ) {
			echo '<span class="tags-links">';
			echo $tags_list;
			echo '</span>';
		}
	}

	// Echo the tags list for single posts.
	else {
		$tags_list = get_the_tag_list( 'Tags: ', esc_html__( ', ', 'magnum-opus' ) );
		if ( $tags_list ) {
			echo '<span class="tags-links">';
			echo $tags_list;
			echo '</span>';
		}
	}

	// Echo the comments link on archive and blog pages.
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="sep"> | </span><span class="comments-link">';
		comments_popup_link( esc_html__( 'No Comments', 'magnum-opus' ), esc_html__( '1 Comment', 'magnum-opus' ), esc_html__( '% Comments', 'magnum-opus' ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'magnumopus_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function magnumopus_entry_meta() {
	// Get the author ID.
	$author_id = get_queried_object()->post_author;

	$byline = sprintf(
		esc_html_x( 'Posted by %s', 'post author', 'magnum-opus' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) . '</a></span>'
	);

	// Get the time string.
	$time_string = magnumopus_time_string();

	$posted_on = sprintf(
		esc_html_x( ' on %s', 'post date', 'magnum-opus' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	// Get the author avatar.
	$author_header_avatar_size = apply_filters( 'magnumopus_author_header_avatar_size', 35 );

	$avatar = get_avatar( get_the_author_meta( 'user_email', $author_id ), $author_header_avatar_size );

	echo '<span class="small-avatar"> ' . $avatar . '</span><span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>';

	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( esc_html__( ', ', 'magnum-opus' ) );
	if ( $categories_list && magnumopus_categorized_blog() ) {
		printf( '<span class="cat-links">' . esc_html__( ' in %1$s', 'magnum-opus' ) . '</span>', $categories_list );
	}
}
endif;

if ( ! function_exists( 'magnumopus_featured_post_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function magnumopus_featured_post_meta() {
	// Get the author ID.
	$author_id = get_queried_object()->post_author;

	$byline = sprintf(
		esc_html_x( 'Posted by %s', 'post author', 'magnum-opus' ),
		'<span class="featured-author vcard">' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) . '</span>'
	);

	// Get the time string.
	$time_string = magnumopus_time_string();

	$posted_on = sprintf(
		esc_html_x( ' on %s', 'post date', 'magnum-opus' ),
		'<span>' . $time_string . '</span>'
	);

	// Get the author avatar.
	$author_featured_avatar_size = apply_filters( 'magnumopus_author_featured_avatar_size', 35 );

	$avatar = get_avatar( get_the_author_meta( 'user_email', $author_id ), $author_featured_avatar_size );

	echo '<div class="featured-meta"><span class="small-avatar"> ' . $avatar . '</span><span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span></div>';
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function magnumopus_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'magnumopus_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'magnumopus_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so magnumopus_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so magnumopus_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in magnumopus_categorized_blog.
 */
function magnumopus_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'magnumopus_categories' );
}
add_action( 'edit_category', 'magnumopus_category_transient_flusher' );
add_action( 'save_post',     'magnumopus_category_transient_flusher' );

/**
 * Return the post URL.
 */
function magnumopus_get_link_url() {
	if ( is_single() ) {
		global $post;
		$content = $post->post_content;
	}
	else {
		$content = get_the_content();
	}

	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'magnumopus_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * 1. - Thumbnail for the testimonials on the front page template.
 * 2. - Thumbnail for posts with the link post format.
 * 3. - Thumbnail for posts with the image post format.
 * 4. - Thumbnail for full width pages.
 * 5. - Thumbnail for singular posts, pages and portfolio items.
 * 6. - Thumbnail for the posts on the blog page and archives.
 *
 * @since Magnum_Opus 1.0
 */
function magnumopus_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() || is_page_template( 'template-parts/template-portfolio.php' ) ) {
		return;
	}

	if ( is_page_template( 'template-parts/template-front-page.php' ) ) : ?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'medium' ); ?>
	</div><!-- .post-thumbnail -->

	<?php elseif ( has_post_format( 'link' ) ) : ?>

	<div class="post-thumbnail">
		<a class="post-thumbnail-link" href="<?php echo esc_url( magnumopus_get_link_url() ); ?>" aria-hidden="true">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		</a>
	</div><!-- .post-thumbnail -->

	<?php elseif ( ! is_singular() && has_post_format( 'image' ) ) : ?>

	<div class="post-thumbnail">
		<a class="post-thumbnail-link" href="<?php echo esc_url( the_permalink() ); ?>" aria-hidden="true">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</a>
	</div><!-- .post-thumbnail -->

	<?php elseif ( is_singular() && is_page_template( 'template-parts/template-full-width.php' ) ) : ?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'magnumopus-full-width-thumbnail' ); ?>
	</div><!-- .post-thumbnail -->

	<?php elseif ( is_singular() ) : ?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<div class="post-thumbnail">
		<a class="post-thumbnail-link" href="<?php esc_url( the_permalink() ); ?>" aria-hidden="true">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		</a>
	</div><!-- .post-thumbnail -->

	<?php endif; // End is_singular()
}
endif; // magnumopus_post_thumbnail

if ( ! function_exists( 'magnumopus_portfolio_image' ) ) :
/**
 * Displays a featured post thumbnail for the portfolio items on the portfolio or front page templates.
 *
 * @since Magnum_Opus 1.0.0
 */
function magnumopus_portfolio_image() {
	if ( ! has_post_thumbnail() ) {
		return;
	}

	$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'magnumopus-portfolio-img' );

	echo 'style="background-image: url(' . esc_url( $thumb_url[0] ) . ');"';

}
endif; // magnumopus_portfolio_image

if ( ! function_exists( 'magnumopus_featured_image' ) ) :
/**
 * Displays a featured image at the top of single posts and pages and pages with a page template.
 *
 * @since Magnum_Opus 1.0.0
 */
function magnumopus_featured_image() {
	// Return if it's not home and there is no featured image.
	if ( ! is_home() && ! has_post_thumbnail() ) {
		return;
	}

	// Return if it's home and there is no featured image for the blog page.
	if ( is_home() && ! has_post_thumbnail( get_option( 'page_for_posts' ) ) ) {
		return;
	}

	// Get the ID of the blog page. 
	if ( get_option( 'page_for_posts' ) && is_home() ) {
		$id = get_option( 'page_for_posts' );
	}

	// Get the post ID.
	else {
		$id = get_the_ID();
	}

	// Get the post thumbnail url.
	$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'magnumopus-featured-img' );

	// Echo the background image.
	echo 'style="background-image: url(' . esc_url( $thumb_url[0] ) . ');"';
}
endif; // magnumopus_featured_image

if ( ! function_exists( 'magnumopus_front_page_optional_images' ) ) :
/**
 * Display an optional background image for the sidekick or testimonial areas on the front page template.
 *
 * @since Magnum_Opus 1.0.0
 */
function magnumopus_front_page_optional_images( $thumbnail_id ) {
	if ( empty( $thumbnail_id ) ) {
		return;
	}

	$thumb_url = wp_get_attachment_image_src( $thumbnail_id, 'magnumopus-featured-img' );

	echo 'style="background-image: url(' . esc_url( $thumb_url[0] ) . ');"';

}
endif; // magnumopus_front_page_optional_images

if ( ! function_exists( 'magnumopus_blog_url' ) ) :
/**
 * Echo the blog url.
 *
 * @since Magnum_Opus 1.0.0
 */
function magnumopus_blog_url() {
	// Get the read more text.
	$read_more = get_theme_mod( 'magnumopus_featured_read_more', __('Read more', 'magnum-opus' ) );

	echo '<div class="url-container"><a class="blog-url" href="' . esc_url( get_permalink( get_option( 'page_for_posts' ) ) ) . '"><div class="container">' . esc_html( $read_more ) . '</div></a></div>';
}
endif; // magnumopus_blog_url

if ( ! function_exists( 'magnumopus_portfolio_url' ) ) :
/**
 * Echo a read more url for the portfolio page if the total posts is higher dan the displayed posts.
 *
 * @since Magnum_Opus 1.0.0
 */
function magnumopus_portfolio_url() {
	// Return if the post limit is greater or equal than total posts.
	$post_limit = get_theme_mod( 'magnumopus_portfolio_limit', 9 );
	$total_posts = wp_count_posts( 'jetpack-portfolio' )->publish;

	if ( $post_limit >= $total_posts ) {
		return;
	}

	// Get the portfolio page url.
	$args = [
		'post_type'		=> 'page',
		'fields'		=> 'ids',
		'nopaging'		=> true,
		'meta_key'		=> '_wp_page_template',
		'meta_value'	=> 'template-parts/template-portfolio.php'
	];
	$pages = get_posts( $args );

	foreach ( $pages as $page ) {
		$portfolio_id = $page;
	}

	$portfolio_url = get_page_link( $portfolio_id );

	// Get the read more text.
	$read_more = get_theme_mod( 'magnumopus_portfolio_read_more', __('Discover more', 'magnum-opus' ) );

	echo '<div class="url-container"><a class="portfolio-url" href="' . esc_url( $portfolio_url ) . '"><div class="container">' . esc_html( $read_more ) . '</div></a></div>';
}
endif; // magnumopus_portfolio_url

if ( ! function_exists( 'magnumopus_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 */
function magnumopus_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif; // magnumopus_the_custom_logo
