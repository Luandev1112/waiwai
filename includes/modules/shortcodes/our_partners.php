<div class="partner-single">
    <div class="inner-box">
        <h2><?php echo wp_kses_post($title); ?></h2>
        <div class="text"><?php echo wp_kses_post($text); ?></div>
        <?php foreach( $atts['our_partners'] as $key => $item ): ?>
        <!--Partner Block-->
        <div class="partner-block">
            <div class="inner-box">
                <div class="content">
                    <div class="client-icon">
                        <img src="<?php echo esc_url($item->img); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                    </div>
                    <h3><?php echo wp_kses_post($item->title); ?></h3>
                    <div class="partner-text"><?php echo wp_kses_post($item->text); ?></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
