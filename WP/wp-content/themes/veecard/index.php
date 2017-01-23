<?php get_header(); ?>


		
       <article>
           <div id="intro">

            <!-- home bio image -->
            <div class="bio-image">

            	<?php if(of_get_option('veecard_home_teaser_image') == '') { ?>

            	<img src="<?php echo get_template_directory_uri(); ?>/images/bio_image.jpg" alt="Martin Smith" />

            	<?php } else { ?>
                    <?php
                      $thumbId = get_image_id_by_link (of_get_option('veecard_home_teaser_image') );
                      $thumb = wp_get_attachment_image_src($thumbId, 'bio-image', false);
                    ?>
            	<img src="<?php echo $thumb[0] ?>" alt="<?php echo of_get_option('veecard_home_name') ?>" />

            	<?php } ?>

            </div>
            <!-- end home bio image -->

            <!-- home bio teaser -->
            <p>
              <?php if(of_get_option('veecard_home_teaser') != '') { ?><?php echo of_get_option('veecard_home_teaser') ?><?php } ?>
            </p>
            <!-- end home bio teaser -->


           </div><!-- end #intro -->


           <!-- home bio info -->
           <div id="bio">
               <ul class="clearfix">
                   <?php if(of_get_option('veecard_home_name')     != '') { ?><li><?php _e('Name','site5framework') ?>: <?php echo of_get_option('veecard_home_name') ?></li><?php } ?>
                   <?php if(of_get_option('veecard_home_email')    != '') { ?><li><?php _e('Email','site5framework') ?>: <?php echo of_get_option('veecard_home_email') ?></li><?php } ?>
                   <?php if(of_get_option('veecard_home_birthday') != '') { ?><li><?php _e('Birthday','site5framework') ?>: <?php echo of_get_option('veecard_home_birthday') ?></li><?php } ?>
                   <?php if(of_get_option('veecard_home_phone')    != '') { ?><li><?php _e('Phone','site5framework') ?>: <?php echo of_get_option('veecard_home_phone') ?></li><?php } ?>
                   <?php if(of_get_option('veecard_home_address')  != '') { ?><li><?php _e('Address','site5framework') ?>: <?php echo of_get_option('veecard_home_address') ?></li><?php } ?>
                   <?php if(of_get_option('veecard_home_web_url')  != '') { ?><li><?php _e('Web','site5framework') ?>: <a href="<?php echo of_get_option('veecard_home_web_url') ?>" target="_blank"><?php echo of_get_option('veecard_home_web_url') ?></a></li><?php } ?>
               </ul>
           </div>
           <!-- end home bio info -->

       </article>
		   

<?php get_footer(); ?>