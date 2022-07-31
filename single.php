<?php $options = _WSH()->option();
	get_header(); 
	$settings  = consultox_set(consultox_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	$meta2 = _WSH()->get_meta();
	_WSH()->page_settings = $meta;
	
	if(consultox_set($_GET, 'layout_style'))
	$layout = consultox_set($_GET, 'layout_style'); else $layout = consultox_set( $meta, 'layout', 'full' );
	
	if( !$layout || $layout == 'full' || consultox_set($_GET, 'layout_style')=='full' ) $sidebar = '';
	else $sidebar = consultox_set( $meta, 'sidebar', 'default-sidebar' );
	$layout = ($layout) ? $layout : 'full';
	$sidebar = ($sidebar) ? $sidebar : 'default-sidebar';
	$classes = ( !$layout || $layout == 'full' || consultox_set($_GET, 'layout_style')=='full' ) ? 'col-lg-12 col-md-12 col-sm-12 col-xs-12' : 'col-lg-9 col-md-8 col-sm-12 col-xs-12';
	/** Update the post views counter */
	_WSH()->post_views( true );
	$bg = (consultox_set($meta1, 'header_img'));
	$title = consultox_set($meta1, 'header_title');
?>
<!--Page Title-->
<section class="page-title" <?php if($bg): ?>style="background-image:url(<?php echo esc_url($bg); ?>);"<?php endif; ?>>
    <div class="auto-container">
        <h1><?php if($title) echo wp_kses_post($title); else wp_title(''); ?></h1>
        <?php echo wp_kses_post(consultox_get_the_breadcrumb()); ?>
    </div>
</section>
<!--End Page Title-->

<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
            
            <!--Content Side-->	
            <div class="content-side <?php echo esc_attr($classes); ?>">
                
                <!--Default Section-->
                <section class="blog-single no-padd-top no-padd-bottom <?php if( $layout == 'right' ) echo " padding-right"; ?>">
                    <div class="thm-unit-test">
					<?php while( have_posts() ): the_post(); 
						$post_meta = _WSH()->get_meta();
						$term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names"));
					?>
                    <!--News Block Three-->
                    <div class="news-block-three style-two">
                        <div class="inner-box">
                            <?php if( has_post_thumbnail() ):?>
                            <div class="image">
                                <?php the_post_thumbnail('consultox_1170x500'); ?>
                            </div>
                            <?php endif;?>
                            <div class="lower-content">
                                <div class="upper-box clearfix">
                                    <div class="posted-date pull-left"><?php echo get_the_date(); ?></div>
                                    <ul class="post-meta pull-right">
                                        <li><?php esc_html_e('By:', 'consultox'); ?> <?php the_author(); ?></li>
                                        <li><?php echo implode( ', ', (array)$term_list ); ?></li>
                                        <li><?php comments_number( wp_kses_post(__('0 Comments' , 'consultox')), wp_kses_post(__('1 Comment' , 'consultox')), wp_kses_post(__('% Comments' , 'consultox'))); ?></li>
                                    </ul>
                                </div>
                                <div class="lower-box clearfix">
                                    <div class="text">
                                    	<?php the_content(); ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <span class="tags"><?php the_tags('Tags: ', ', ');?></span>
                                    <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'consultox'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Start add comment box-->
					<?php comments_template(); ?>
                    <!--End add comment box-->
                    <?php endwhile;?>
                    </div>
                </section>
            </div>
            <!--Content Side-->
            
            <!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>