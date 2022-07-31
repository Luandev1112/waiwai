<?php $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args); ?>

<!--Quote Section-->
<section class="quote-section">
    <div class="auto-container">
        <div class="row clearfix">
        	<?php if($query->have_posts()): ?>
            <!--Content Column-->
            <div class="content-column col-md-8 col-sm-12 col-xs-12">
                <div class="sec-title-two">
                    <h2><?php echo wp_kses_post($editor); ?></h2>
                </div>
                <div class="text"><?php echo wp_kses_post($text); ?> <a href="<?php echo esc_url($btn_link); ?>"><?php echo wp_kses_post($btn_title); ?></a></div>
                <div class="row clearfix">
                	<?php while($query->have_posts()): $query->the_post();
					global $post;
					$services_meta = _WSH()->get_meta(); ?>
                    <!--Services Block Three-->
                    <div class="services-block-three col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon <?php echo str_replace("icon ", "", consultox_set($services_meta, 'fontawesome')); ?>"></span>
                            </div>
                            <h3><a href="<?php echo esc_url(consultox_set($services_meta, 'ext_url')); ?>"><?php the_title(); ?></a></h3>
                            <div class="services-text"><?php echo wp_kses_post(consultox_trim(get_the_content(), $text_limit)); ?></div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; wp_reset_postdata(); ?>
            
            <!--Form Column-->
            <div class="form-column col-md-4 col-sm-12 col-xs-12">
                <div class="inner-column hvr-bounce-to-bottom">
                    <h2><?php echo wp_kses_post($contact_title); ?></h2>
                    <div class="text"><?php echo wp_kses_post($contact_text); ?></div>
                    <div class="default-form">
                        <?php echo do_shortcode($contact_shortcode); ?>
                    </div>
                    <!--Default Form-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Quote Section-->
