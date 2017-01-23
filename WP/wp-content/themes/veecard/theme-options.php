<?php
/*********************************************************************************************

Initalize Framework Settings

*********************************************************************************************/
if ( !function_exists( 'optionsframework_init' ) ) {

define('OPTIONS_FRAMEWORK_URL',  get_template_directory_uri() . '/admin/');
define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory() . '/admin/');


require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'options-framework.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'inc/contentvalidation.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'inc/customfunctions.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'inc/portfolio.post.type.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'inc/resume.post.type.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'inc/pagination.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'inc/widgets.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'inc/wpnavmenu.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'inc/wphooks.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'inc/customizer.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'meta-box-class/meta-box-setup.php');
require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'inc/ajax-thumbnail-rebuild.php');
}

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
    $optionsframework_settings = get_option('optionsframework');
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    if ( get_option($option_name) ) {
        $options = get_option($option_name);
    }
    if ( isset($options[$name]) ) {
        return $options[$name];
    } else {
        return $default;
    }
}
}

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(get_stylesheet_directory() . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	$shortname = "veecard";

    $numberofs_array = array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20");

    $robots_array = array(
    "none" => "none",
    "index,follow" => "index,follow",
    "index, follow" => "index, follow",
    "index,nofollow" => "index,nofollow",
    "index,all" => "index,all",
    "index,follow,archive" => "index,follow,archive",
    "noindex,follow" => "noindex,follow",
    "noindex,nofollow" => "noindex,nofollow"
    );

    $skins_array = array(
    "default" => "default.css",
    "light.css" => "light.css"
    );

    $patterns_array = array(
    "default" => "default",
    "pattern_00" => "Pattern 1",
    "pattern_01" => "Pattern 2",
    "pattern_02" => "Pattern 3",
    "pattern_03" => "Pattern 4",
    "pattern_04" => "Pattern 5",
    "pattern_05" => "Pattern 6",
    "pattern_06" => "Pattern 7"
    );


	// Background Defaults

	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');


	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	$options_categories[''] = 'All Categories';
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}

	// Pull all the custom post name into an array
	$options_custom_posts = array();
	$options_custom_posts_obj = get_posts('post_type=resume&sort_column=post_parent,menu_order');
	$options_custom_posts[''] = 'Select a page:';
	foreach ($options_custom_posts_obj as $post) {
    	$options_custom_posts[$post->ID] = $post->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/admin/images/';
	$blogpath =  get_stylesheet_directory_uri() . '/';

	$options = array();


/*********************************************************************************************

Initalize Theme Options

*********************************************************************************************/
if ( !function_exists( 'optionsframeworks_init' ) ) {

define('OPTIONS_URL', get_template_directory_uri() . '/admin/options/');
define('OPTIONS_DIRECTORY', get_template_directory() . '/admin/options/');

require( OPTIONS_DIRECTORY . 'general.php' );
require( OPTIONS_DIRECTORY . 'homepage.php' );
require( OPTIONS_DIRECTORY . 'typography.php' );
require( OPTIONS_DIRECTORY . 'colors.php');
require( OPTIONS_DIRECTORY . 'contact.php' );
require( OPTIONS_DIRECTORY . 'social.php' );
require( OPTIONS_DIRECTORY . 'meta.php' );
require( OPTIONS_DIRECTORY . 'footer.php' );
require( OPTIONS_DIRECTORY . 'thumbnails.php' );
}

	return $options;
}

/*********************************************************************************************

Upload Mime-types

*********************************************************************************************/
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
 $existing_mimes['ico'] = 'application/x-ico';
 $existing_mimes['vcf'] = 'text/x-vcard';
 
 return $existing_mimes;
}
?>