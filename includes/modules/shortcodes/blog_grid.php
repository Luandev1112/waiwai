<?php $paged = get_query_var('paged');
global $post;
$query_args = array('post_type' => 'post', 'showposts' => $num, 'order_by' => $sort, 'order' => $order, 'paged' => $paged);
if( $cat ) $query_args['category_name'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--News Page Section-->
<section class="news-page-section">
	<div class="auto-container">
		<div class="row clearfix">
			<?php while($query->have_posts()): $query->the_post();
			global $post;
			$posts_meta = _WSH()->get_meta();
			$term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names")); ?>
			<!--News Block Three-->
			<div class="news-block-three col-md-6 col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="image">
						<a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_post_thumbnail('consultox_570x360'); ?></a>
					</div>
					<div class="lower-content">
						<div class="upper-box">
							<div class="posted-date"><?php echo get_the_date('d M. Y'); ?></div>
							<ul class="post-meta">
								<li><?php esc_html_e('By:', 'consultox'); ?> <?php the_author(); ?></li>
								<li><?php echo implode( ', ', (array)$term_list ); ?></li>
								<li><?php comments_number( wp_kses_post(__('0 Comments' , 'consultox')), wp_kses_post(__('1 Comment' , 'consultox')), wp_kses_post(__('% Comments' , 'consultox'))); ?></li>
							</ul>
						</div>
						<div class="lower-box">
							<h3><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
							<div class="text"><?php echo wp_kses_post(consultox_trim(get_the_content(), $text_limit)); ?></div>
							<a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="theme-btn btn-style-two read-more"><?php esc_html_e('Read more', 'consultox'); ?></a>
						</div>
					</div>
				</div>
			</div>
            <?php endwhile; ?>
		</div>
		
		<!--Styled Pagination-->
		<div class="styled-pagination text-center">
        	<?php consultox_the_pagination(array('total'=>$query->max_num_pages, 'next_text' => '<span class="fa fa-angle-right"></span>', 'prev_text' => '<span class="fa fa-angle-left"></span>')); ?>
		</div>                
		<!--End Styled Pagination-->
	</div>
</section>
<!--News Page Section-->

<?php endif; wp_reset_postdata(); ?>