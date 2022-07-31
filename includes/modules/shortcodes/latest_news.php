<?php global $post;
$query_args = array('post_type' => 'post' , 'showposts' => $num, 'order_by' => $sort, 'order' => $order);
if( $cat ) $query_args['category_name'] = $cat;
$query = new WP_Query($query_args);

$query_args1 = array('post_type' => 'post' , 'showposts' => $num1, 'order_by' => $sort1, 'order' => $order1);
if( $cat1 ) $query_args1['category_name'] = $cat1;
$query1 = new WP_Query($query_args1); ?>

<?php if($query->have_posts()): ?>

<!--News Section-->
<section class="news-section">
	<div class="auto-container">
		<div class="sec-title-two">
			<h2><?php echo wp_kses_post($title); ?></h2>
		</div>
		<div class="row clearfix">
			<!--Column-->
			<div class="column col-md-8 col-sm-12 col-xs-12">
				<div class="row clearfix">
					<?php while($query->have_posts()): $query->the_post();
					global $post;
					$posts_meta = _WSH()->get_meta(); ?>
					<!--News Block-->
					<div class="news-block col-md-6 col-sm-6 col-xs-12">
						<div class="inner-box hvr-float">
							<div class="image">
								<a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_post_thumbnail('consultox_370x245'); ?></a>
								<div class="post-date"><?php echo get_the_date('d M. Y'); ?></div>
							</div>
							<div class="lower-box">
								<h3><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
								<div class="text"><?php echo wp_kses_post(consultox_trim(get_the_content(), $text_limit)); ?></div>
								<a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="read-more"><?php esc_html_e('Read more', 'consultox'); ?></a>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			
			<!--Column-->
			<div class="column col-md-4 col-sm-12 col-xs-12">
				<div class="sidebar-news">
                	<?php while($query1->have_posts()): $query1->the_post();
					global $post;
					$posts_meta1 = _WSH()->get_meta(); ?>
					<!--News Block Two-->
					<div class="news-block-two">
						<div class="inner-box">
							<h3><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
							<div class="post-date"><?php echo get_the_date('M d Y'); ?></div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			
		</div>
		
	</div>
</section>
<!--End News Section-->

<?php endif; wp_reset_postdata(); ?>