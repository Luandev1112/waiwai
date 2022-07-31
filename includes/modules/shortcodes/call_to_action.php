<!--Call To Action Section-->
<section class="call-to-action-section" style="background-image:url(<?php echo esc_url($bg_img); ?>)">
    <div class="auto-container">
        <h2><?php echo wp_kses_post($text); ?></h2>
        <div class="number-box clearfix">
            <div class="pull-left">
                <div class="number"><?php echo wp_kses_post($phone); ?></div>
            </div>
            <div class="pull-right">
                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-three"><?php echo wp_kses_post($btn_title); ?></a>
            </div>
        </div>
    </div>
</section>
<!--End Call To Action Section-->
