<!--Project Section-->
<section class="project-section">
	<div class="auto-container">
		<h2><?php echo wp_kses_post($title); ?></h2>
	</div>
	
	<!--Porfolio Tabs-->
	<div class="project-tab">
		<div class="auto-container">
			<div class="tab-btns-box">
				<!--Tabs Header-->
				<div class="tabs-header">
					<ul class="product-tab-btns clearfix">
                    	<?php foreach( $atts['product_tabs'] as $key => $item ): ?>
                        <li class="p-tab-btn <?php if($key == 1) echo 'active-btn'; ?>" data-tab="#p-tab-<?php echo esc_attr($key); ?>"><?php echo wp_kses_post($item->title); ?></li>
                        <?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
		<!--Tabs Content-->  
		<div class="p-tabs-content">
        	<?php foreach( $atts['product_tabs'] as $key => $item ):
				$num = $item->num;
				$cat = $item->cat;
				$sort = $item->sort;
				$order = $item->order;
			?>
			<!--Portfolio Tab / Active Tab-->
            <div class="p-tab <?php if($key == 1) echo 'active-tab'; ?>" id="p-tab-<?php echo esc_attr($key); ?>">
				<div class="project-carousel owl-theme owl-carousel">
					<?php $query_args = array('post_type' => 'bunch_projects' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
					   if( $cat ) $query_args['projects_category'] = $cat;
					   $query = new WP_Query($query_args); 
						
						if($query->have_posts()):
						 
						while($query->have_posts()): $query->the_post();
						global $post ;
						$project_meta = _WSH()->get_meta();
					?>
					<!--Gallery Item-->
					<div class="gallery-item">
						<div class="inner-box">
							<figure class="image-box">
								<?php the_post_thumbnail('consultox_384x295'); ?>
								<!--Overlay Box-->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="link"><span class="icon flaticon-unlink"></span></a>
										</div>
									</div>
								</div>
							</figure>
							<h3><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
						</div>
					</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!--End Project Section-->
