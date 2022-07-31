<!--Faq Form Section-->
<section class="faq-form-section">
    <div class="auto-container">
        <div class="sec-title-two">
            <h2><?php echo wp_kses_post($contact_title); ?></h2>
        </div>
        <!--Form Outer-->
        <div class="form-outer">
            <!--Faq Form-->
            <div class="faq-form-box">
                <!--Contact Form-->
                <?php echo do_shortcode($contact_shortcode); ?>
            </div>
            <!--End Faq Form-->
        </div>
    </div>
</section>
