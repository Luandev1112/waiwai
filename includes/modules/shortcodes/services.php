<?php $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--Services Section-->
<section class="services-section">
	<div class="auto-container">
		<div class="row clearfix">
			<?php while($query->have_posts()): $query->the_post();
			global $post;
			$services_meta = _WSH()->get_meta(); ?>
			<!--Services Block Two-->
			<div class="services-block-two col-md-4 col-sm-6 col-xs-12">
				<div class="inner-box hvr-float-shadow">
					<div class="icon-box">
						<span class="icon <?php echo str_replace("icon ", "", consultox_set($services_meta, 'fontawesome')); ?>"></span>
					</div>
					<h3><a href="<?php echo esc_url(consultox_set($services_meta, 'ext_url')); ?>"><?php the_title(); ?></a></h3>
					<div class="text"><?php echo wp_kses_post(consultox_trim(get_the_content(), $text_limit)); ?></div>
					<a href="<?php echo esc_url(consultox_set($services_meta, 'ext_url')); ?>" class="read-more"><?php esc_html_e('Read more', 'consultox'); ?></a>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<!--End Services Section-->

<?php endif; wp_reset_postdata(); ?>