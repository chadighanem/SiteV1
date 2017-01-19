<?php
/*********************************************************************************************
Employed Custom Post Type
********************************************************************************************/
$labels = array(
	'name' => _x('Resume', 'post type general name', 'site5framework'),
    'singular_name' => _x('Resume', 'post type singular name', 'site5framework'),
    'add_new' => _x('Add New', 'resume', 'site5framework'),
    'add_new_item' => __('Add New Resume', 'site5framework'),
    'edit_item' => __('Edit Resume', 'site5framework'),
    'new_item' => __('New Resume', 'site5framework'),
    'view_item' => __('View Resume', 'site5framework'),
    'search_items' => __('Search Resume', 'site5framework'),
    'not_found' =>  __('No resume found', 'site5framework'),
    'not_found_in_trash' => __('No resume found in trash', 'site5framework'),
    'parent_item_colon' => ''
  );
register_post_type('resume', array(
     'labels' => $labels,
     'singular_label' => __('resume'),
     'public' => true,
     'show_ui' => true, // UI in admin panel
     '_builtin' => false, // It's a custom post type, not built in!
     '_edit_link' => 'post.php?post=%d',
     'capability_type' => 'post',
     'hierarchical' => false,
     'rewrite' => array("slug" => "resume"), // Permalinks format
     'supports' => array('title','editor','thumbnail','page-attributes')
));



// Styling for the custom post type icon

add_action( 'admin_head', 'veecard_resume_icons' );

function veecard_resume_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-resume .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/resume-icon.png) no-repeat 6px 6px !important;
        }
		#menu-posts-resume:hover .wp-menu-image, #menu-posts-resume.wp-has-current-submenu .wp-menu-image {
            background-position:6px -22px !important;
        }
		#icon-edit.icon32-posts-resume {background: url(<?php echo get_template_directory_uri(); ?>/admin/images/resume-32x32.png) no-repeat;}
    </style>

<?php }?>