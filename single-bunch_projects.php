<?php $options = _WSH()->option();
	get_header(); 
	$settings  = consultox_set(consultox_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	$meta2 = _WSH()->get_meta();
	_WSH()->page_settings = $meta;
	
	_WSH()->post_views( true );
	$bg = (consultox_set($meta, 'header_img')) ? consultox_set($meta, 'header_img') : get_template_directory_uri().'/images/background/6.jpg';
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

<?php while( have_posts() ): the_post();
global $post;
$projects_meta = _WSH()->get_meta();
$page_style = consultox_set($projects_meta, 'project_page_style');
$projects_image = consultox_set($projects_meta, 'bunch_projects_image');
$related_data = consultox_set($projects_meta, 'bunch_related_projects');
$term_list = wp_get_post_terms(get_the_id(), 'projects_category', array("fields" => "names")); ?>
<!--Gallery Single Section-->
<section class="gallery-single">
    <div class="auto-container">
        <div class="inner-container">
            <div class="upper-content">
                <div class="image">
                    <img src="<?php echo esc_url(consultox_set($projects_meta, 'project_image')); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                </div>
                <div class="image-info">
                    <div class="row clearfix">
                        <div class="info-column col-md-6 col-sm-6 col-xs-12">
                            <ul>
                                <li><span><?php esc_html_e('Customer :', 'consultox'); ?></span><?php echo wp_kses_post(consultox_set($projects_meta, 'customer')); ?></li>
                                <li><span><?php esc_html_e('Category :', 'consultox'); ?></span><?php echo implode( ', ', (array)$term_list ); ?></li>
                                <li><span><?php esc_html_e('Date :', 'consultox'); ?></span><?php echo wp_kses_post(consultox_set($projects_meta, 'date')); ?></li>
                            </ul>
                        </div>
                        <div class="info-column col-md-6 col-sm-6 col-xs-12">
                            <ul>
                                <li><span><?php esc_html_e('Status :', 'consultox'); ?></span><?php echo wp_kses_post(consultox_set($projects_meta, 'status')); ?></li>
                                <li><span><?php esc_html_e('Live demo :', 'consultox'); ?></span><?php echo wp_kses_post(consultox_set($projects_meta, 'live_demo')); ?></li>
                                <li><span><?php esc_html_e('Tags :', 'consultox'); ?></span><?php echo wp_kses_post(consultox_set($projects_meta, 'tags')); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-content">
            
                <!--Upper Box-->
                <div class="upper-box">
                    <div class="sec-title-two">
                        <h2><?php esc_html_e('Project Description', 'consultox'); ?></h2>
                    </div>
                    <div class="text">
                        <?php the_content(); ?>
                    </div>
                </div>
                
                <!--Middle Box-->
                <div class="middle-box">
                    <div class="row clearfix">
                        <!--Content Column-->
                        <div class="content-column col-md-8 col-sm-12 col-xs-12">
                            <div class="sec-title-two">
                                <h2><?php echo wp_kses_post(consultox_set($projects_meta, 'what_title')); ?></h2>
                            </div>
                            <?php echo wp_kses_post(consultox_set($projects_meta, 'what_description')); ?>
                        </div>
                        <!--Image Column-->
                        <div class="image-column col-md-4 col-sm-8 col-xs-12">
                            <div class="image">
                                <img src="<?php echo esc_url(consultox_set($projects_meta, 'what_image')); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Lower Box-->
                <div class="lower-box">
                    <div class="sec-title-two">
                        <h2><?php echo wp_kses_post(consultox_set($projects_meta, 'result_title')); ?></h2>
                    </div>
                    <div class="text">
                        <?php echo wp_kses_post(consultox_set($projects_meta, 'result_description')); ?>
                    </div>
                    <ul class="list-style-five">
                    	<?php $result_listing = consultox_set($projects_meta, 'result_listing');
						$fearures = explode("\n", ($result_listing));
						foreach($fearures as $feature): ?>
						<li><?php echo wp_kses_post($feature); ?></li>
						<?php endforeach; ?>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!--End Gallery Section-->
<?php endwhile; ?>

<?php get_footer(); ?>