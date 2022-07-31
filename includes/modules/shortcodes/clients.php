<!--Clients Section-->
<section class="clients-section <?php if($bg_color) { echo 'style-two alternate'; } ?>">
    <div class="auto-container">
        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
            	<?php foreach( $atts['clients'] as $key => $item ): ?>
                <li class="slide-item"><figure class="image-box"><a href="<?php echo esc_url($item->url); ?>"><img src="<?php echo esc_url($item->img); ?>" alt="<?php echo wp_kses_post($item->title); ?>"></a></figure></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
<!--End Clients Section-->
