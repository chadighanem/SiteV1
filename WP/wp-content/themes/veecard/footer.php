                </div>
                <!-- end #main -->
            </div>
            <!-- end .main-container -->

            <!-- .footer-container -->
            <div class="footer-container clearfix">

                <!-- begin #socialIcons -->
                    <div id="social-icons" class="clearfix">
                        <ul id="social-links" class="clearfix">
                            <?php if(of_get_option('veecard_facebook')!='') : ?>
                            <li class="facebook-link"><a href="<?php echo of_get_option('veecard_facebook') ?>" class="facebook" id="social-01" title="<?php _e( 'Join Us on Facebook!', 'site5framework' ); ?>">Facebook</a></li>
                            <?php endif ?>
                            <?php if(of_get_option('veecard_twitter')!=''): ?>
                            <li class="twitter-link"><a href="<?php echo of_get_option('veecard_twitter') ?>" class="twitter" id="social-02" title="<?php _e( 'Follow Us on Twitter', 'site5framework' ); ?>">Twitter</a></li>
                            <?php endif ?>
                            <?php if(of_get_option('veecard_googleplus')!=''): ?>
                            <li class="google-link"><a href="<?php echo of_get_option('veecard_googleplus') ?>" id="social-03" title="<?php _e( 'Google+', 'site5framework' ); ?>" class="google">Google</a></li>
                            <?php endif ?>
                            <?php if(of_get_option('veecard_dribble')!=''): ?>
                            <li class="dribbble-link"><a href="<?php echo of_get_option('veecard_dribble') ?>" id="social-04" title="<?php _e( 'Dribble', 'site5framework' ); ?>" class="dribbble">Dribble</a></li>
                            <?php endif ?>
                            <?php if(of_get_option('veecard_vimeo')!=''): ?>
                            <li class="vimeo-link"><a href="<?php echo of_get_option('veecard_vimeo') ?>" id="social-05" title="<?php _e( 'Vimeo', 'site5framework' ); ?>" class="vimeo">Vimeo</a></li>
                            <?php endif ?>
                            <?php if(of_get_option('veecard_skype')!=''): ?>
                            <li class="skype-link"><a href="<?php echo of_get_option('veecard_skype') ?>" id="social-06" title="<?php _e( 'Skype', 'site5framework' ); ?>" class="skype">Skype</a></li>
                            <?php endif ?>
                            <?php if(of_get_option('veecard_linkedin')!=''): ?>
                            <li class="linkedin-link"><a href="<?php echo of_get_option('veecard_linkedin') ?>" id="social-07" title="<?php _e( ' LinkedIn', 'site5framework' ); ?>" class="linkedin">Linkedin</a></li>
                            <?php endif ?>
                            <?php if(of_get_option('veecard_pinterest')!=''): ?>
                            <li class="pinterest-link"><a href="<?php echo of_get_option('veecard_pinterest') ?>" id="social-09" title="<?php _e( 'Pinterest', 'site5framework' ); ?>" class="pinterest">Pinterest</a></li>
                            <?php endif ?>
                            <?php if(of_get_option('veecard_rss')=='1'): ?>
                                <li class="rss-link"><a href="<?php echo of_get_option('veecard_extrss') ?  of_get_option('sc_extrss') : bloginfo('rss_url'); ?>" id="social-08" title="<?php _e( 'RSS', 'site5framework' ); ?>" class="rss">RSS Feeds</a></li>
                        <?php endif ?>
                        </ul>
                    </div>
                <!-- end #socialIcons -->
                <footer class="">
                    <!-- begin copyright -->
					<?php if(of_get_option('veecard_footer_copyright') == '') { ?>
					Copyright &copy; <?php echo date("Y"); ?> All Rights Reserved  Theme by <a href="http://gk.site5.com/t/570">Site5 WordPress Hosting</a>.
					<?php } else { ?>
					<?php echo of_get_option('veecard_footer_copyright')  ?>
					<?php } ?>
					<!-- end copyright -->

					<!-- Site5 Credits-->
					<br>Created by <a href="http://www.s5themes.com/">Site5 WordPress Themes</a>. Experts in <a href="http://gk.site5.com/t/570">WordPress Hosting</a>
					<!-- end Site5 Credits-->
                </footer>
            </div>
            <!-- end .footer-container -->

        </div>
        <!-- end #page -->

	<?php wp_footer(); ?>

	</body>
</html>