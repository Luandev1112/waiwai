<!--Contact Section-->
<section class="contact-section">
    <div class="auto-container">
        <h2><?php echo wp_kses_post($title); ?></h2>
        <div class="text"><?php echo wp_kses_post($text); ?></div>
        <div class="row clearfix">
            <!--Form Column-->
            <div class="form-column col-md-6 col-sm-12 col-xs-12">
                <!--Contact Form-->
                <div class="contact-form">
                    <div id="contact-form">
						<?php echo do_shortcode($contact_shortcode); ?>
                    </div>
                </div>
                <!--Contact Form-->
            </div>
            <!--Info Column-->
            <div class="info-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <ul>
                        <li><span><?php esc_html_e('Address:', 'consultox'); ?></span><?php echo wp_kses_post($address); ?></li>
                        <li><span><?php esc_html_e('Phone:', 'consultox'); ?></span><?php echo wp_kses_post($phone); ?></li>
                        <li><span><?php esc_html_e('Email:', 'consultox'); ?></span><?php echo sanitize_email($email); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Contact Section-->
