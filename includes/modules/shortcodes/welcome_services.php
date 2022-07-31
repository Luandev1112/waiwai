<?php $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--Welcome Section-->
<section class="welcome-section" style="background-image:url(<?php echo esc_url($bg_img); ?>)">
	<div class="auto-container">
		<!--Services Title-->
		<div class="services-title">
			<div class="title"><?php echo wp_kses_post($title); ?></div>
			<h2><?php echo wp_kses_post($text); ?></h2>
		</div>
		<div class="row clearfix">
			<?php while($query->have_posts()): $query->the_post();
			global $post;
			$services_meta = _WSH()->get_meta(); ?>
			<!--Services Block-->
			<div class="services-block col-md-4 col-sm-6 col-xs-12">
				<div class="inner-box hvr-float-shadow">
					<div class="image">
						<a href="<?php echo esc_url(consultox_set($services_meta, 'ext_url')); ?>"><?php the_post_thumbnail('consultox_370x190'); ?></a>
					</div>
					<div class="lower-content">
						<h3><a href="<?php echo esc_url(consultox_set($services_meta, 'ext_url')); ?>"><?php the_title(); ?></a></h3>
						<div class="text"><?php echo wp_kses_post(consultox_trim(get_the_content(), $text_limit)); ?></div>
						<a href="<?php echo esc_url(consultox_set($services_meta, 'ext_url')); ?>" class="read-more"><?php esc_html_e('Read more', 'consultox'); ?></a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<!--End Welcome Section-->

<?php endif; wp_reset_postdata(); ?>