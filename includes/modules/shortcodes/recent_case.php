<!--Study Section-->
<section class="study-section <?php if($bg_color) { echo 'alternate'; } ?>">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="sec-title">
                    <div class="title"><?php echo wp_kses_post($title); ?></div>
                    <h2><?php echo wp_kses_post($subtitle); ?></h2>
                </div>
                <div class="text"><?php echo wp_kses_post($text); ?></div>
                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-four"><?php echo wp_kses_post($btn_title); ?></a>
            </div>
            <!--Image Column-->
            <div class="image-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <!--Video Box-->
                    <div class="video-box">
                        <figure class="image">
                            <img src="<?php echo esc_url($video_img); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>">
                        </figure>
                        <a href="<?php echo esc_url($video_url); ?>" class="lightbox-image overlay-box"><span class="flaticon-play-button-2"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Study Section-->
