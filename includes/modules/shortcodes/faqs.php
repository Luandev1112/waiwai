<?php $count = 1;
$query_args = array('post_type' => 'bunch_faqs' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['category'] = $cat;
$query = new WP_Query($query_args);
$left_arr = array();
$right_arr = array();
if($query->have_posts()):
while($query->have_posts()): $query->the_post();
		global $post;
		$services_meta = _WSH()->get_meta();
		if($count > 2) $count = 1;
		$active = ( $query->current_post == 0 ) ? 'active' : '';
		$current = ( $query->current_post == 0 ) ? 'current' : '';
				?>
                <?php if( ($count == 1)):
					$left_arr[get_the_id()] = '<li class="accordion block">
													<div class="acc-btn '.$active.'"><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div>'.get_the_title(get_the_id()).'</div>
													<div class="acc-content '.$current.'">
														<div class="content">
															<div class="text">'.wp_kses_post(consultox_trim(get_the_content(), $text_limit)).'</div>
														</div>
													</div>
												</li>';
				?>
                <?php else:
					$right_arr[get_the_id()] = '<li class="accordion block">
													<div class="acc-btn"><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div>'.get_the_title(get_the_id()).'</div>
													<div class="acc-content">
														<div class="content">
															<div class="text">'.wp_kses_post(consultox_trim(get_the_content(), $text_limit)).'</div>
														</div>
													</div>
												</li>';
				?>
                <?php endif; ?>
                <?php $count++; endwhile; ?>
<!--Faq Section-->
<section class="faq-section">
    <div class="auto-container">
        <div class="sec-title-two">
            <h2><?php echo wp_kses_post($title); ?></h2>
            <div class="text"><?php echo wp_kses_post($text); ?></div>
        </div>
        <!-- faq Form -->
        <div class="faq-search-box">
        	<?php echo get_template_part('searchform3'); ?>
        </div>
        
        <div class="row clearfix">
            <div class="column col-md-6 col-sm-12 col-xs-12">
                <!--Accordian Box-->
                <ul class="accordion-box faq">
                    <?php foreach($left_arr as $key => $content):
					echo wp_kses_post($content);
					endforeach; ?>
                </ul>
            </div>
            <div class="column col-md-6 col-sm-12 col-xs-12">
                <!--Accordian Box-->
                <ul class="accordion-box faq">
                    <?php foreach($right_arr as $key => $right_content):
					echo wp_kses_post($right_content);
					endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Faq Section-->

<?php endif; wp_reset_postdata(); ?>