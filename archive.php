<?php consultox_bunch_global_variable(); 
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option();
	if(consultox_set($_GET, 'layout_style')) $layout = consultox_set($_GET, 'layout_style'); else
	$layout = consultox_set( $settings, 'archive_page_layout', 'full' );
	if( !$layout || $layout == 'full' || consultox_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = consultox_set( $settings, 'archive_page_sidebar', 'default-sidebar' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	$layout = ($layout) ? $layout : 'full';
	$sidebar = ($sidebar) ? $sidebar : 'default-sidebar';
	if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
	$classes = ( !$layout || $layout == 'full' || consultox_set($_GET, 'layout_style')=='full' ) ? 'col-lg-12 col-md-12 col-sm-12 col-xs-12' : 'col-lg-9 col-md-8 col-sm-12 col-xs-12';
	$bg = (consultox_set($settings, 'archive_page_header_img'));
	$title = consultox_set($settings, 'archive_page_header_title');
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
                <section class="blog-classic padding-right no-padd-top no-padd-bottom">
                    <!--Blog Post-->
                    <div class="thm-unit-test">
					<?php while( have_posts() ): the_post(); ?>
						<!-- blog post item -->
						<!-- Post -->
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php get_template_part( 'blog' ); ?>
						<!-- blog post item -->
						</div><!-- End Post -->
					<?php endwhile; ?>
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