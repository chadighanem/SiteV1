<?php
class td_module_mx5 extends td_module {

    function __construct($post) {
        //run the parrent constructor
        parent::__construct($post);
    }

    function render($order_no) {
        ob_start();
        ?>

        <div class="<?php echo $this->get_module_classes(array("td-big-grid-post-$order_no", "td-big-grid-post td-mx-15")); ?>">
            <div class="td-module-image">
                <?php echo $this->get_image('td_485x360');?>
                <div class="td-post-category-wrap"><?php if (td_util::get_option('tds_category_module_mx4') == 'yes') { echo $this->get_category(); }?></div>
            </div>

            <div class="td-meta-info-container">
                <div class="td-meta-align">
                    <div class="td-big-grid-meta">
                        <?php echo $this->get_title();?>
                    </div>

                    <div class="td-module-meta-info">
                        <?php echo $this->get_date();?>
                    </div>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}