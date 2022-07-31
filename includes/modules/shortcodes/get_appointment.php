<!--Appointment Section-->
<section class="appointment-section" style="background-image:url(<?php echo esc_url($bg_img); ?>)">
    <div class="auto-container clearfix">
        <div class="inner-container">
            <h2><?php echo wp_kses_post($title); ?></h2>
            <div class="text"><?php echo wp_kses_post($text); ?></div>
            <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-two"><?php echo wp_kses_post($btn_title); ?></a>
        </div>
    </div>
</section>
<!--End Appointment Section-->
