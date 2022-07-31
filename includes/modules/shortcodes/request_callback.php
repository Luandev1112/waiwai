<!--Call Back Section-->
<section class="call-back-section" style="background-image:url(<?php echo esc_url($bg_img); ?>)">
    <div class="auto-container">
        <!--Sec Title Two-->
        <div class="sec-title-two light">
            <h2><?php echo wp_kses_post($contact_title); ?></h2>
        </div>
        <!-- Call Back Form -->
        <div class="call-back-form">
            <!--Call Back Form-->
            <?php echo do_shortcode($contact_shortcode); ?>
        </div>
    </div>
</section>
<!--End Call Back Section-->
