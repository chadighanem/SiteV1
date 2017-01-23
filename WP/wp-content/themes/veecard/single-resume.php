<?php get_header();

//pull bio info from custom meta
$bio_name = get_post_meta($post->ID,'resume_bio_name',true);
$bio_address = get_post_meta($post->ID,'resume_bio_address',true);
$bio_location = get_post_meta($post->ID,'resume_bio_location',true);
$bio_email = get_post_meta($post->ID,'resume_bio_email',true);
$bio_phone = get_post_meta($post->ID,'resume_bio_phone',true);
$bio_url = get_post_meta($post->ID,'resumebio_bio_url',true);
?>

		<article>
		    <header>
		        <div class="bio-header clearfix">
		            <div class="col_half first">
		                <h1 class="bio-title"><?php if ($bio_name == '') { ?>Martin Smith<?php } else { ?><?php echo $bio_name ?><?php } ?></h1>
		                <span class="bio-address"><?php if($bio_address != '') { ?><?php echo $bio_address ?><?php } ?></span>
		                <span class="bio-location"><?php if($bio_location != '') { ?><?php echo $bio_location ?><?php } ?></span>
		            </div>

		            <div class="col_half clearfix">

		                <div class="bio-image">
							<?php
							$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'bio-image' );
							if(has_post_thumbnail()): echo '<img src="'.$thumbnail[0].'" alt="'. $bio_name .'"/>'; else: ?><img src="<?php bloginfo('template_url'); ?>/images/bio_image.jpg" alt="Martin Smith" />
							<?php endif; ?>
		                </div>
		                <div class="bio-info">
		                    <span class="bio-phone"><?php if($bio_phone != '') { ?><?php echo $bio_phone ?><?php } ?></span>
		                    <span class="bio-email"><?php if($bio_email != '') { ?><?php echo $bio_email ?><?php } ?></span>
		                </div>

		            </div>
		        </div>
		    </header>

		    <section>

		        <!-- personal info -->
		        <div class="box clearfix">
		            <div class="col_half">
		                <h2><?php _e("Personal Information", "site5framework"); ?></h2>
		            </div>
		            <div class="col_half">
		            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		            <?php the_content(); ?>
		            <?php endwhile; endif;?>
		            </div>
		        </div>
		        <!-- end personal info -->



		        <!-- employment info -->
		        <?php 
		        //Pull employment info from custom meta
				$employment_info = get_post_meta($post->ID,'resume_job_',true);
				if($employment_info != '') {
				?>
		        <h2><?php _e("Employment", "site5framework"); ?></h2>
		        <div class="box clearfix">

					<?php
						
						foreach ($employment_info as $arr){
						?>
						<div class="col_half first">
		               			<span class="job-period"><?php echo $arr['resume_job_fromdate'] ?> - <?php echo $arr['resume_job_todate'] ?></span>
		               			<h3 class="job-title"><?php echo $arr['resume_job_title'] ?></h3>
		               			<?php if($arr['resume_job_url']!='') { ?>
		               			<a class="job-url" href="<?php echo $arr['resume_job_url'] ?>" target="_blank">
		               				<?php echo $arr['resume_job_employer'] ?>
		               			</a>
		               			<?php } else { ?>
		               				<?php echo $arr['resume_job_employer'] ?>
		               			<?php } ?>
		           			 </div>
							<div class="col_half">
							   <p><?php echo $arr['resume_job_description'] ?></p>
							</div>
					<?php } ?>


		        </div>
		        <?php } ?>
		        <!-- end employment info -->

		        <!-- education info -->
		        <?php
		        //Pull education info from custom meta
				$education_info = get_post_meta($post->ID,'resume_edu_',true);
				if($education_info != '') {
				?>
		        <h2><?php _e("Education", "site5framework"); ?></h2>
		        <div class="box clearfix">

			        <?php
						foreach ($education_info as $arr){
						echo '<div class="col_half last">
								<span class="job-period">'.$arr['resume_edu_year'].'</span>
		               			<h3 class="job-education-title">'.$arr['resume_edu_degree'].'</h3>
							 </div>
							';
						}
					?>

		        </div>
		        <?php } ?>
		        <!-- end education info -->

		        <?php 
		        //Pull skill info from custom meta
				$skill_info = get_post_meta($post->ID,'resume_skill_',true);
				if($skill_info !='') {
				?>
		        <!-- skills -->
		        <h2><?php _e("Skills", "site5framework"); ?></h2>
		        <div class="box clearfix">

			        <?php
						
						foreach ($skill_info as $arr){
						echo '<div class="col_half ">
		               			<span class="job-skill">'.$arr['resume_skill_name'].'</span>
		               			<span class="job-skill-scale ">
		               				<span class="job-skill-number skill-'.$arr['resume_skill_level'].' ir">'.$arr['resume_skill_level'].'/10</span>
		               			</span>
		            		</div>
							';
						}
					?>

		        </div>
		        <?php } ?>
		        <!-- end skills -->

		    </section>
		</article>

<?php get_footer(); ?>