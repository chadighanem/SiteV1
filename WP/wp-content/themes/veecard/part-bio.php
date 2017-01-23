 <header>
    <div class="bio-header clearfix">
        <div class="col_half first">
            <?php if(of_get_option('veecard_home_name') != '') { ?><h1 class="bio-title"><?php echo of_get_option('veecard_home_name') ?></h1><?php } ?>
            <?php if(of_get_option('veecard_home_address') != '') { ?><span class="bio-location"><?php echo of_get_option('veecard_home_address') ?></span><?php } ?>
        </div>

        <div class="col_half clearfix">
            <?php if (of_get_option('veecard_home_teaser_image') != '') { ?>
            <div class="bio-image">

                <?php
                    $thumbId = get_image_id_by_link (of_get_option('veecard_home_teaser_image') );

                    $thumb = wp_get_attachment_image_src($thumbId, 'bio-image', false);
                ?>
               
				<img src="<?php echo $thumb[0] ?>" alt="<?php echo of_get_option('veecard_home_name') ?>" />
            </div>
            <?php } ?>
            <div class="bio-info">
                <?php if(of_get_option('veecard_home_phone') == '') { ?><span class="bio-phone"><?php echo of_get_option('veecard_home_phone') ?></span><?php } ?>
                <?php if(of_get_option('veecard_home_email') == '') { ?><span class="bio-email"><?php echo of_get_option('veecard_home_email') ?></span><?php } ?>
            </div>

        </div>
    </div>
</header>