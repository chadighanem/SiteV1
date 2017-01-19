<?php
/**
 * MyResume Theme Customizer
 *
 * @package MyResume
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function myresume_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
} 
 
 
function myresume_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_section( 'background_image' );
$wp_customize->remove_section( 'nav' );
$wp_customize->remove_section( 'static_front_page' );

//bring header image top
$wp_customize->get_section( 'header_image' )->priority = 30;

// Add Top Intro Section
$wp_customize->add_section( 'intro-section' , array(
    'title' => __( 'Top Section Name & Intro', 'myresume' ),
    'priority' => 30,
     'capability'     => 'edit_theme_options',
    'description' => __( 'It appears below your photo header.', 'myresume' )
) );

// Add Your Name Setting
$wp_customize->add_setting( 'name' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __( 'Your Name Here', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'name', array(
    'label' => __( 'Name', 'myresume' ),'section' => 'intro-section','settings' => 'name',
) ) );

// Add Your Skill/Job Title Setting
$wp_customize->add_setting( 'job_title' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Apps Developer', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'job_title', array(
    'label' => __( 'Job Title', 'myresume' ),'section' => 'intro-section','settings' => 'job_title',
) ) );

// Intro Text/Objective
$wp_customize->add_setting( 'intro_text' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Your can write a para here about you or your objective e.g. Hi There I am <b>Mohsin Rasool</b>. I am WordPress developer and have passion for everything WordPress and Open Source software. I am skilled in SEO, User Interface and solving programming problems. ', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'intro_text', array(
    'label' => __( 'Intro/Objective', 'myresume' ),'section' => 'intro-section','settings' => 'intro_text','type' => 'textarea',
) ) );

// Add Education Section
$wp_customize->add_section( 'edu-section' , array(
    'title' => __( 'Education Section', 'myresume' ),
    'priority' => 30,
		'capability'     => 'edit_theme_options',
    'description' => __( 'It appears on timeline bar below intro.', 'myresume' )
) );


// Education 1
$wp_customize->add_setting( 'edu_1' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Highschool - 2010', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'edu_1', array(
    'label' => __( 'Education Block-1', 'myresume' ),'section' => 'edu-section','settings' => 'edu_1',
) ) );
// Education 2
$wp_customize->add_setting( 'edu_2' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'BSCS - 2012', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'edu_2', array(
    'label' => __( 'Education Block-2', 'myresume' ),'section' => 'edu-section','settings' => 'edu_2',
) ) );
// Education 3
$wp_customize->add_setting( 'edu_3' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Masters MIT - 2014' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'edu_3', array(
    'label' => __( 'Education Block-3', 'myresume' ),'section' => 'edu-section','settings' => 'edu_3',
) ) );


// Add Experience Section
$wp_customize->add_section( 'exp-section' , array(
    'title' => __( 'Experience Section', 'myresume' ),
    'priority' => 30,
    'capability'     => 'edit_theme_options',
    'description' => __( 'It appears below education timeline bar.', 'myresume' )
) );

// Exp 1
$wp_customize->add_setting( 'exp_1' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Work Experience ' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'exp_1', array(
    'label' => __( 'Experience Section Title', 'myresume' ),'section' => 'exp-section','settings' => 'exp_1',
) ) );

$wp_customize->add_setting( 'exp_area' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Project Manager [Apr 2013-Nov 2014 ] DPixel, Dhaka-Bangladesh ' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'exp_area', array(
    'label' => __( 'Experience Section Title', 'myresume' ),'section' => 'exp-section','settings' => 'exp_area','type' => 'textarea',
) ) );


// Add Info Section
$wp_customize->add_section( 'info-section' , array(
    'title' => __( 'Personal Info Section', 'myresume' ),
    'priority' => 30,
		'capability'     => 'edit_theme_options',
    'description' => __( 'It appears below education timeline bar.', 'myresume' )
) );

// Exp 1
$wp_customize->add_setting( 'info_1' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Personal Info ' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'info_1', array(
    'label' => __( 'Personal Section Title', 'myresume' ),'section' => 'info-section','settings' => 'info_1',
) ) );

$wp_customize->add_setting( 'info_area' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Project Manager [Apr 2013-Nov 2014 ] DPixel, Dhaka-Bangladesh ', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'info_area', array(
    'label' => __( 'Info Section Title', 'myresume' ),'section' => 'info-section','settings' => 'info_area','type' => 'textarea',
) ) );




// Add Skill Rating Section
$wp_customize->add_section( 'prof-section' , array(
    'title' => __( 'Skill Rating Section 1', 'myresume' ),
    'priority' => 30,
    'capability'     => 'edit_theme_options',
    'description' => __( 'It appears below Work Experience.', 'myresume' )
) );

// Title
$wp_customize->add_setting( 'prof_title' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Proficiency Skill ', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'prof_title', array(
    'label' => __( 'Section Title', 'myresume' ),'section' => 'prof-section','settings' => 'prof_title',
) ) );

//1
$wp_customize->add_setting( 'prof_1' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'WordPress', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'prof_1', array(
    'label' => __( 'Skill 1', 'myresume' ),'section' => 'prof-section','settings' => 'prof_1',
) ) );

//1 stars
$wp_customize->add_setting( 'prof_1_stars' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  '3.5' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'prof_1_stars', array(
    'label' => __( 'Skill 1 star rating', 'myresume' ),'section' => 'prof-section','settings' => 'prof_1_stars',
) ) );
//2
$wp_customize->add_setting( 'prof_2' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'WordPress', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'prof_2', array(
    'label' => __( 'Skill 2', 'myresume' ),'section' => 'prof-section','settings' => 'prof_2',
) ) );

//2 stars
$wp_customize->add_setting( 'prof_2_stars' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  '3.5' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'prof_2_stars', array(
    'label' => __( 'Skill 2 star rating', 'myresume' ),'section' => 'prof-section','settings' => 'prof_2_stars',
) ) );
//3
$wp_customize->add_setting( 'prof_3' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'WordPress' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'prof_3', array(
    'label' => __( 'Skill 3', 'myresume' ),'section' => 'prof-section','settings' => 'prof_3',
) ) );

//3 stars
$wp_customize->add_setting( 'prof_3_stars' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  '3.5' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'prof_3_stars', array(
    'label' => __( 'Skill 3 star rating', 'myresume' ),'section' => 'prof-section','settings' => 'prof_3_stars',
) ) );




// Add Skill 2 Rating Section
$wp_customize->add_section( 'pro-section' , array(
    'title' => __( 'Skill Rating Section 2', 'myresume' ),
    'priority' => 30,
    'capability'     => 'edit_theme_options',
    'description' => __( 'It appears below Work Experience.', 'myresume' )
) );

// Title
$wp_customize->add_setting( 'pro_title' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Professional Skill ', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pro_title', array(
    'label' => __( 'Section Title', 'myresume' ),'section' => 'pro-section','settings' => 'pro_title',
) ) );

//1
$wp_customize->add_setting( 'pro_1' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Web Design' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pro_1', array(
    'label' => __( 'Skill 1', 'myresume' ),'section' => 'pro-section','settings' => 'pro_1',
) ) );

//1 stars
$wp_customize->add_setting( 'pro_1_stars' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  '3.5' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pro_1_stars', array(
    'label' => __( 'Skill 1 star rating', 'myresume' ),'section' => 'pro-section','settings' => 'pro_1_stars',
) ) );
//2
$wp_customize->add_setting( 'pro_2' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Graphic Design' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pro_2', array(
    'label' => __( 'Skill 2', 'myresume' ),'section' => 'pro-section','settings' => 'pro_2',
) ) );

//2 stars
$wp_customize->add_setting( 'pro_2_stars' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  '3.5' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pro_2_stars', array(
    'label' => __( 'Skill 2 star rating', 'myresume' ),'section' => 'pro-section','settings' => 'pro_2_stars',
) ) );
//3
$wp_customize->add_setting( 'pro_3' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'UI/UX Design' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pro_3', array(
    'label' => __( 'Skill 3', 'myresume' ),'section' => 'pro-section','settings' => 'pro_3',
) ) );

//3 stars
$wp_customize->add_setting( 'pro_3_stars' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  '3.5' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pro_3_stars', array(
    'label' => __( 'Skill 3 star rating', 'myresume' ),'section' => 'pro-section','settings' => 'pro_3_stars',
) ) );  





// Add Skill 3 Rating Section
$wp_customize->add_section( 'per-section' , array(
    'title' => __( 'Skill Rating Section 3', 'myresume' ),
    'priority' => 30,
    'capability'     => 'edit_theme_options',
    'description' => __( 'It appears below Work Experience.', 'myresume' )
) );

// Title
$wp_customize->add_setting( 'per_title' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Personal Skill ', 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'per_title', array(
    'label' => __( 'Section Title', 'myresume' ),'section' => 'per-section','settings' => 'per_title',
) ) );

//1
$wp_customize->add_setting( 'per_1' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Leadership' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'per_1', array(
    'label' => __( 'Skill 1', 'myresume' ),'section' => 'per-section','settings' => 'per_1',
) ) );

//1 stars
$wp_customize->add_setting( 'per_1_stars' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  '3.5' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'per_1_stars', array(
    'label' => __( 'Skill 1 star rating', 'myresume' ),'section' => 'per-section','settings' => 'per_1_stars',
) ) );
//2
$wp_customize->add_setting( 'per_2' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Team Player' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'per_2', array(
    'label' => __( 'Skill 2', 'myresume' ),'section' => 'per-section','settings' => 'per_2',
) ) );

//2 stars
$wp_customize->add_setting( 'per_2_stars' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  '3.5' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'per_2_stars', array(
    'label' => __( 'Skill 2 star rating', 'myresume' ),'section' => 'per-section','settings' => 'per_2_stars',
) ) );
//3
$wp_customize->add_setting( 'per_3' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Creativity' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'per_3', array(
    'label' => __( 'Skill 3', 'myresume' ),'section' => 'per-section','settings' => 'per_3',
) ) );

//3 stars
$wp_customize->add_setting( 'per_3_stars' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  '3.5' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'per_3_stars', array(
    'label' => __( 'Skill 3 star rating', 'myresume' ),'section' => 'per-section','settings' => 'per_3_stars',
) ) );





// Passions & Hobbies
$wp_customize->add_section( 'ph-section' , array(
    'title' => __( 'Passions & Hobbies', 'myresume' ),
    'priority' => 30,
    'capability'     => 'edit_theme_options',
    'description' => __( 'It appears below Skills Rating sections.', 'myresume' )
) );

// Title
$wp_customize->add_setting( 'ph_title' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Passions & Hobbies' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ph_title', array(
    'label' => __( 'Section Title', 'myresume' ),'section' => 'ph-section','settings' => 'ph_title',
) ) );

for($myresume_i=1;$myresume_i<7;$myresume_i++) {

$myresume_no = $myresume_i;
	
$wp_customize->add_setting( 'ph_'.$myresume_no ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'Reading' , 'myresume' ) ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ph_'.$myresume_no, array(
    'label' => __( 'Hobby ', 'myresume' ),'section' => 'ph-section','settings' => 'ph_'.$myresume_no,
)));

$wp_customize->add_setting( 'ph_'.$myresume_no.'dashi' ,  array('sanitize_callback' => 'myresume_sanitize_text','default' => __(  'dashicons-desktop' , 'myresume' )));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ph_'.$myresume_no.'dashi', array(
    'label' => __( 'Dashicons Icon Class Name', 'myresume' ),'section' => 'ph-section','settings' => 'ph_'.$myresume_no.'dashi',
)));
}



}



add_action( 'customize_register', 'myresume_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function myresume_customize_preview_js() {
	wp_enqueue_script( 'myresume_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'myresume_customize_preview_js' );
