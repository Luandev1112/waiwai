<?php consultox_bunch_global_variable(); 
$options = _WSH()->option();
get_header(); 
if( $wp_query->is_posts_page ) {
	$meta = _WSH()->get_meta('_bunch_layout_settings', get_queried_object()->ID);
	$meta1 = _WSH()->get_meta('_bunch_header_settings', get_queried_object()->ID);
	if(consultox_set($_GET, 'layout_style')) $layout = consultox_set($_GET, 'layout_style'); else
	$layout = consultox_set( $meta, 'layout', 'full' );
	$sidebar = consultox_set( $meta, 'sidebar', 'default-sidebar' );
	$bg = (consultox_set($meta1, 'header_img'));
	$title = consultox_set($meta1, 'header_title');
} else {
	$settings  = _WSH()->option(); 
	if(consultox_set($_GET, 'layout_style')) $layout = consultox_set($_GET, 'layout_style'); else
	$layout = consultox_set( $settings, 'archive_page_layout', 'full' );
	$sidebar = consultox_set( $settings, 'archive_page_sidebar', 'default-sidebar' );
	$bg = (consultox_set($settings, 'archive_page_header_img'));
	$title = consultox_set($settings, 'archive_page_header_title');
}
$layout = consultox_set( $_GET, 'layout' ) ? consultox_set( $_GET, 'layout' ) : $layout;
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
$layout = ( $layout ) ? $layout : 'full';
_WSH()->page_settings = array('layout'=>'right', 'sidebar'=>$sidebar);
$classes = ( !$layout || $layout == 'full' || consultox_set($_GET, 'layout_style')=='full' ) ? 'col-lg-12 col-md-12 col-sm-12 col-xs-12' : 'col-lg-9 col-md-8 col-sm-12 col-xs-12';
?>
<!--Page Title-->
<section class="page-title" <?php if($bg): ?>style="background-image:url(<?php echo esc_url($bg); ?>);"<?php endif; ?>>
    <div class="auto-container">
        <h1><?php esc_html_e('Our Blog', 'consultox'); ?></h1>
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
                <section class="blog-classic padding-right no-padd-top no-padd-bottom">
                    <!--Blog Post-->
                    <div class="thm-unit-test">
					<?php while( have_posts() ): the_post();?>
                        <!-- blog post item -->
                        <!-- Post -->
                        <div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                            <?php get_template_part( 'blog' ); ?>
                        <!-- blog post item -->
                        </div><!-- End Post -->
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