<style type="text/css" media="all">
	
	/* Body Font face */
	body {
		<?php if(of_get_option('veecard_bodyfontlink') != '' and of_get_option('veecard_bodyfontface') != '') { ?>
   		<?php echo of_get_option('veecard_bodyfontface');?>
   		<?php } ?>;
    }

	/* Headings Font face */
	h1,h2,h3,h4,h5,h6, .main h1, #intro {
		<?php if(of_get_option('veecard_headingfontlink') != '' and of_get_option('veecard_headingfontface') != '') { ?>
   		<?php echo of_get_option('veecard_headingfontface');?>
   		<?php } ?>;
    }

   	/* Headings Font colors */
	h1,h2,h3,h4,h5,h6, .main h1, h1 a  {
		<?php if(of_get_option('veecard_main_h_color') !='') { ?>color:<?php echo of_get_option('veecard_main_h_color')?><?php } ?>;
	}

   	/* Accent Font colors and background */
	.bio-header .bio-phone, .bio-header .bio-email, .job-period, #intro strong, #intro span  {
		<?php if(of_get_option('veecard_main_accent_color') !='') { ?>color:<?php echo of_get_option('veecard_main_accent_color')?><?php } ?>;
	}

	.filterable li.active a, #social-links li a:hover {
		<?php if(of_get_option('veecard_main_accent_color') !='') { ?>background-color:<?php echo of_get_option('veecard_main_accent_color')?><?php } ?>;
	}
</style>