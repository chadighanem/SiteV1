<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MyResume
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main full-width" role="main">

<div class="intro">
<?php echo wp_kses_post( get_theme_mod( 'intro_text', __( 'Your can write a para here about you or your objective e.g. Hi There I am <b>Mohsin Rasool</b>. I am WordPress developer and have passion for everything WordPress and Open Source software. I am skilled in SEO, User Interface and solving programming problems. ' , 'myresume' ) ) ); ?>

</div>

<div class="grid">

<br>
<div class="timeline-bar"></div>
<div class="row icons bar">
<div class="c1"></div>
		<div class="c3 ">
<span class="dashicons dashicons-admin-home"></span>

<?php echo wp_kses_post( get_theme_mod( 'edu_1', __( 'Highschool - 2008', 'myresume' ) ) ); ?>



</div>
<div class="c1"></div>
		<div class="c3 ">
<span class="dashicons dashicons-awards"></span>
<?php echo wp_kses_post( get_theme_mod( 'edu_2', __( 'BSCS - 2010', 'myresume' ) ) ); ?>

</div>
<div class="c1"></div>

		<div class="c3 end">

<span class="dashicons dashicons-welcome-learn-more"></span>
<?php echo wp_kses_post( get_theme_mod( 'edu_3', __( 'Masters MIT - 2014', 'myresume' ) ) ); ?>


</div>

</div>

<br>


<div class="row">
		<div class="c5 work">
		
<div class="section-head"><?php echo wp_kses_post( get_theme_mod( 'exp_1', __( 'Work Experience', 'myresume' ) ) ); ?></div>
<div class="section-content">		

<br>

<?php echo wp_kses_post( get_theme_mod( 'exp_area', __( 'Masters MIT - 2014', 'myresume' ) ) ); ?>
<br>

</div>

		</div>
		<div class="c2"></div>		
		
		<div class="c5 work end">
		
		<div class="section-head"><?php echo wp_kses_post( get_theme_mod( 'info_1', __( 'Personal Info', 'myresume' ) ) ); ?></div>
		
<br>
<?php echo wp_kses_post( get_theme_mod( 'info_area', __( 'Masters MIT - 2014', 'myresume' ) ) ); ?>
		
		</div>
	</div> <!-- row ends -->




<div class="row stars">
<div class="c4 ">		
<div class="section-head">
<?php echo wp_kses_post( get_theme_mod( 'prof_title', __( 'Proficiency Skill', 'myresume' ) ) ); ?>
</div>
<div class="section-content">		

<br><b>
<?php echo wp_kses_post( get_theme_mod( 'prof_1', __( 'WordPress', 'myresume' ) ) ); ?>
</b><div class="alignright">
<?php myresume_skill_stars(get_theme_mod("prof_1_stars")); ?>
</div>


<br><b>
<?php echo wp_kses_post( get_theme_mod( 'prof_2', __( 'Joomla', 'myresume' ) ) ); ?>
</b><div class="alignright">
<?php myresume_skill_stars(get_theme_mod("prof_2_stars")); ?>
</div>


<br><b>
<?php echo wp_kses_post( get_theme_mod( 'prof_3', __( 'Drupal', 'myresume' ) ) ); ?>
</b><div class="alignright">
<?php myresume_skill_stars(get_theme_mod("prof_3_stars")); ?>
</div>


</div></div> <!-- c4 ends-->
	


<div class="c4 ">		
<div class="section-head">
<?php echo wp_kses_post( get_theme_mod( 'pro_title', __( 'Professional Skill', 'myresume' ) ) ); ?>
</div>
<div class="section-content">		

<br><b>
<?php echo wp_kses_post( get_theme_mod( 'pro_1', __( 'Web Design', 'myresume' ) ) ); ?>
</b><div class="alignright">
<?php myresume_skill_stars(get_theme_mod("pro_1_stars")); ?>
</div>


<br><b>
<?php echo wp_kses_post( get_theme_mod( 'pro_2', __( 'Graphic Design', 'myresume' ) ) ); ?>
</b><div class="alignright">
<?php myresume_skill_stars(get_theme_mod("pro_2_stars")); ?>
</div>


<br><b>
<?php echo wp_kses_post( get_theme_mod( 'pro_3', __( 'UI/UX Design', 'myresume' ) ) ); ?>
</b><div class="alignright">
<?php myresume_skill_stars(get_theme_mod("pro_3_stars")); ?>
</div>


</div></div> <!-- c4 ends-->




<div class="c4 end">		
<div class="section-head">
<?php echo wp_kses_post( get_theme_mod( 'per_title', __( 'Personal Skill', 'myresume' ) ) ); ?>
</div>
<div class="section-content">		

<br><b>
<?php echo wp_kses_post( get_theme_mod( 'per_1', __( 'Leadership', 'myresume' ) ) ); ?>
</b><div class="alignright">
<?php myresume_skill_stars(get_theme_mod("per_1_stars")); ?>
</div>


<br><b>
<?php echo wp_kses_post( get_theme_mod( 'per_2', __( 'Team Player', 'myresume' ) ) ); ?>
</b><div class="alignright">
<?php myresume_skill_stars(get_theme_mod("per_2_stars")); ?>
</div>


<br><b>
<?php echo wp_kses_post( get_theme_mod( 'per_3', __( 'Creativity', 'myresume' ) ) ); ?>
</b><div class="alignright">
<?php myresume_skill_stars(get_theme_mod("per_3_stars")); ?>
</div>


</div></div> <!-- c4 ends-->

		
		
	</div> <!-- row ends -->

<br>


<div class="row ">
		<div class="c6 ">
		
<div class="section-head arrow_box">
<?php 
echo wp_kses_post( get_theme_mod( 'ph_title' , __( 'Passions & Hobbies' , 'myresume' ) ) );
 ?>
</div>
		</div>
		
			<div class="c6 end">

		</div>
		
		
	</div> <!-- row ends -->



<div class="row icons">
		<div class=" c2">
<span class="dashicons <?php echo wp_kses_post( get_theme_mod( 'ph_1_dashi', __( 'dashicons-desktop', 'myresume' ) ) ); ?>"></span>
<?php echo wp_kses_post( get_theme_mod( 'ph_1', __( 'Watching', 'myresume' ) ) ); ?>
		</div>

<div class=" c2">
<span class="dashicons <?php echo wp_kses_post( get_theme_mod( 'ph_2_dashi', __( 'dashicons-desktop', 'myresume' ) ) ); ?>"></span>
<?php echo wp_kses_post( get_theme_mod( 'ph_2', __( 'Reading', 'myresume' ) ) ); ?>
		</div>


<div class=" c2">
<span class="dashicons <?php echo wp_kses_post( get_theme_mod( 'ph_3_dashi', __( 'dashicons-desktop', 'myresume' ) ) ); ?>"></span>
<?php echo wp_kses_post( get_theme_mod( 'ph_3', __( 'Browsing', 'myresume' ) ) ); ?>
		</div>


<div class=" c2">
<span class="dashicons <?php echo wp_kses_post( get_theme_mod( 'ph_4_dashi', __( 'dashicons-desktop', 'myresume' ) ) ); ?>"></span>
<?php echo wp_kses_post( get_theme_mod( 'ph_4', __( 'Public Speaking', 'myresume' ) ) ); ?>
		</div>


<div class=" c2">
<span class="dashicons <?php echo wp_kses_post( get_theme_mod( 'ph_5_dashi', __( 'dashicons-desktop', 'myresume' ) ) ); ?>"></span>
<?php echo wp_kses_post( get_theme_mod( 'ph_5', __( 'Football', 'myresume' ) ) ); ?>
		</div>

<div class=" c2">
<span class="dashicons <?php echo wp_kses_post( get_theme_mod( 'ph_6_dashi', __( 'dashicons-desktop', 'myresume' ) ) ); ?>"></span>
<?php echo wp_kses_post( get_theme_mod( 'ph_6', __( 'Travel', 'myresume' ) ) ); ?>
		</div>


		
	</div> <!-- row ends -->






</div> <!-- grid ends -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
