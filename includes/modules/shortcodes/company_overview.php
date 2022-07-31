<!--Sidebar Page Container-->
<div class="company-single">
    <div class="inner-box">
        <div class="image">
            <img src="<?php echo esc_url($img); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
        </div>
        <h3><?php echo wp_kses_post($title); ?></h3>
        <div class="text">
            <?php echo wp_kses_post($text); ?>
            <div class="two-column row clearfix">
                <div class="image-column col-md-4 col-sm-4 col-xs-12">
                    <div class="inner-image">
                        <img src="<?php echo esc_url($img_top); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                    </div>
                    <div class="inner-image">
                        <img src="<?php echo esc_url($img_bottom); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                    </div>
                </div>
                <div class="content-column col-md-8 col-sm-8 col-xs-12">
                    <h3><?php echo wp_kses_post($title1); ?></h3>
                    <?php echo wp_kses_post($text1); ?>
                    <ul class="list-style-one style-two">
                        <?php $fearures = explode("\n", ($text_list));
						foreach($fearures as $feature): ?>
						<li><?php echo wp_kses_post($feature); ?></li>
						<?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <h3><?php echo wp_kses_post($title2); ?></h3>
            <?php echo wp_kses_post($text2); ?>
        </div>
    </div>
</div>
