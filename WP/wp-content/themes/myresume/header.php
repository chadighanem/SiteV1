<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package MyResume
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'myresume' ); ?></a>

	


	<header id="masthead" class="site-header" role="banner">

<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>"  alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	<span class="site-title">
	
	
<?php echo esc_html( get_theme_mod('name', __( 'Your Name Here', 'myresume' ) ) ); ?>	
	
	
	</span>
			<span class="site-description">
<?php echo esc_html( get_theme_mod('job_title', __( 'Your Job Title', 'myresume' ) ) ); ?>

			</span>	
		</a>
	</div>
	<?php endif; ?>
	
	</header><!-- #masthead -->

	<div id="content" class="site-content">
