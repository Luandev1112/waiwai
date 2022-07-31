<?php $count = 1;
$query_args = array('post_type' => 'bunch_faqs' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);

if( $cat ) $query_args['faqs_category'] = $cat;
$query = new WP_Query($query_args); ?>

<!--Default Section-->
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Company Column-->
            <div class="company-column column col-md-6 col-sm-12 col-xs-12">
                <div class="sec-title-two">
                    <h2><?php echo wp_kses_post($title); ?></h2>
                </div>
                <div class="inner-column">
                    <div class="company-gallery">
                        <div class="row clearfix">
                            <!--Image Column-->
                            <div class="image-column col-md-6 col-sm-6 col-xs-12">
                                <div class="image">
                                    <img src="<?php echo esc_url($img_left); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                                </div>
                            </div>
                            <!--Image Column-->
                            <div class="image-column col-md-6 col-sm-6 col-xs-12">
                                <div class="image">
                                    <img src="<?php echo esc_url($img_right); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3><?php echo wp_kses_post($subtitle); ?></h3>
                    <div class="text"><?php echo wp_kses_post($text); ?></div>
                    <ul class="list-style-one">
                    	<?php $fearures = explode("\n", ($text_list));
						foreach($fearures as $feature): ?>
						<li><?php echo wp_kses_post($feature); ?></li>
						<?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <?php if($query->have_posts()): ?>
            <!--General Column-->
            <div class="general-column column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="sec-title-two">
                        <h2><?php echo wp_kses_post($title1); ?></h2>
                    </div>
                    <!--Accordian Box-->
                    <ul class="accordion-box">
                        <?php while($query->have_posts()): $query->the_post();
						global $post;
						$faqs_meta = _WSH()->get_meta(); ?>
                        <!--Block-->
                        <li class="accordion block <?php if($count == 1) { echo 'active-block'; } ?>">
                            <div class="acc-btn <?php if($count == 1) { echo 'active'; } ?>"><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div><?php the_title(); ?></div>
                            <div class="acc-content <?php if($count == 1) { echo 'current'; } ?>">
                                <div class="content">
                                    <div class="text"><?php echo wp_kses_post(consultox_trim(get_the_content(), $text_limit)); ?></div>
                                </div>
                            </div>
                        </li>
                        <?php $count++; endwhile; ?>
                    </ul>
                </div>
            </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<!--End Default Section-->
