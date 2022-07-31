<?php $options = _WSH()->option();
	get_header();
	$settings  = consultox_set(consultox_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	if(consultox_set($_GET, 'layout_style')) $layout = consultox_set($_GET, 'layout_style'); else
	$layout = consultox_set( $meta, 'layout', 'full' );
	$sidebar = consultox_set( $meta, 'sidebar', 'default-sidebar' );
	$layout = ($layout) ? $layout : 'full';
	$sidebar = ($sidebar) ? $sidebar : 'default-sidebar';
	$classes = ( !$layout || $layout == 'full' || consultox_set($_GET, 'layout_style')=='full' ) ? 'col-lg-12 col-md-12 col-sm-12 col-xs-12' : 'col-lg-9 col-md-8 col-sm-12 col-xs-12';
	$bg = (consultox_set($meta, 'header_img'));
	$title = consultox_set($meta, 'header_title');
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
            <div class="content-side <?php echo esc_attr($classes);?>">
                <!--Default Section-->
                <section class="blog-classic no-padd-top no-padd-bottom <?php if( $layout == 'right' ) echo " padding-right"; ?>">
                    <!--Blog Post-->
                    <div class="thm-unit-test">
					<?php while( have_posts() ): the_post();?>
                        <!-- blog post item -->
                        <?php the_content(); ?>
                        <div class="clearfix"></div>
                        <?php comments_template(); ?><!-- end comments -->
                        <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'consultox'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                    <?php endwhile;?>
                    </div>
                    <!--Styled Pagination-->
                    <div class="styled-pagination">
                        <?php consultox_the_pagination(); ?>
                    </div>                
                    <!--End Styled Pagination-->
                </section>
            </div>
            <!--Content Side-->
            
            <!--Sidebar-->	
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
            <!--Sidebar-->
            
        </div>
    </div>
</div>

<?php get_footer(); ?>