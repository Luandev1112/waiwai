<div class="history-single">
    <div class="inner-box">
        <div class="image">
            <img src="<?php echo esc_url($img); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
        </div>
        <h3><?php echo wp_kses_post($title); ?></h3>
        <div class="text">
            <?php echo wp_kses_post($text); ?>
        </div>
        
        <?php foreach( $atts['company_history'] as $key => $item ): ?>
        <!--History Block-->
        <div class="history-block">
            <div class="inner">
                <div class="year"><?php echo wp_kses_post($item->year); ?></div>
                <h4><?php echo wp_kses_post($item->title); ?></h4>
                <div class="text"><?php echo wp_kses_post($item->text); ?></div>
                <div class="images-gallery">
                    <div class="row clearfix">
                    	<?php if($item->img_left) { ?>
                        <div class="image-column col-md-6 col-sm-6 col-xs-12">
                            <div class="image">
                                <img src="<?php echo esc_url($item->img_left); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                            </div>
                        </div>
                        <?php } if($item->img_right) { ?>
                        <div class="image-column col-md-6 col-sm-6 col-xs-12">
                            <div class="image">
                                <img src="<?php echo esc_url($item->img_right); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
