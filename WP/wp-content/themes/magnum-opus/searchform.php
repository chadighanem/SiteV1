<?php
/**
 * The search form.
 *
 * Displays the search form. Delete this file if you want to use the default WordPress search form.
 *
 * @package Magnum_Opus
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'before form', 'magnum-opus' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'magnum-opus' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'magnum-opus' ); ?>" />
	</label>
	<button class="search-submit"><span class="screen-reader-text"><?php esc_attr_e('Search Submit', 'magnum-opus'); ?></span><span class="genericon genericon-search" aria-hidden="true"></span></button>
</form>
