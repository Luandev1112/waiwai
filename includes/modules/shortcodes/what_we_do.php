<?php $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--We Do Section-->
<section class="we-do-section">
	<div class="auto-container">
		<div class="row clearfix">
			<!--Title Column-->
			<div class="title-column col-lg-3 col-md-12 col-sm-12 col-xs-12">
				<div class="sec-title">
					<h2><?php echo wp_kses_post($title); ?></h2>
				</div>
				<div class="text"><?php echo wp_kses_post($text); ?></div>
				<a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-two"><?php echo wp_kses_post($btn_title); ?></a>
			</div>
			<!--Services Column-->
			<div class="services-column col-lg-9 col-md-12 col-sm-12 col-xs-12">
				<div class="row clearfix">
					<?php while($query->have_posts()): $query->the_post();
					global $post;
					$services_meta = _WSH()->get_meta(); ?>
					<!--Services Block Four-->
					<div class="services-block-four col-md-4 col-sm-6 col-xs-12">
						<div class="inner-box hvr-float">
							<div class="image">
								<?php the_post_thumbnail('consultox_270x284'); ?>
								<div class="overlay-box"></div>
							</div>
							<div class="lower-box">
								<h3><a href="<?php echo esc_url(consultox_set($services_meta, 'ext_url')); ?>"><?php the_title(); ?></a></h3>
								<div class="text"><?php echo wp_kses_post(consultox_set($services_meta, 'subtitle')); ?></div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			
		</div>
	</div>
</section>
<!--End We Do Section-->

<?php endif; wp_reset_postdata(); ?>