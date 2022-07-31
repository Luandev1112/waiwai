<!--Ceo Section-->
<section class="ceo-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Image Column-->
            <div class="image-column col-md-6 col-sm-12 col-xs-12">
                <div class="image">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <h2><?php echo wp_kses_post($title); ?></h2>
                    <?php echo wp_kses_post($text); ?>
                    <div class="signature"><img src="<?php echo esc_url($signature); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" /></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Ceo Section-->
