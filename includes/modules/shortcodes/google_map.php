<!--Map Section-->
<section class="map-section">
    <!--Map Outer-->
    <div class="map-outer">
        <!--Map Canvas-->
        <div class="map-canvas"
            data-zoom="<?php echo wp_kses_post($zoom); ?>"
            data-lat="<?php echo wp_kses_post($latitude); ?>"
            data-lng="<?php echo wp_kses_post($longitude); ?>"
            data-type="roadmap"
            data-hue="#ffc400"
            data-title="<?php echo wp_kses_post($name); ?>"
            data-icon-path="<?php echo esc_url(get_template_directory_uri()); ?>/images/icons/map-marker.png"
            data-content="<?php echo wp_kses_post($address); ?><br><a href='mailto:<?php echo sanitize_email($email); ?>'><?php echo sanitize_email($email); ?></a>">
        </div>
    </div>
</section>
<!--End Map Section-->
