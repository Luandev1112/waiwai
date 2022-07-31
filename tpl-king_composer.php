<?php /* Template Name: King Composer Page */
	get_header() ;
	$meta = _WSH()->get_meta('_bunch_header_settings');
	$bg = (consultox_set($meta, 'header_img')) ? consultox_set($meta, 'header_img') : get_template_directory_uri().'/images/background/6.jpg';
	$title = consultox_set($meta, 'header_title');
?>
<?php if(consultox_set($meta, 'breadcrumb')):?>
<!--Page Title-->
<section class="page-title" <?php if($bg): ?>style="background-image:url(<?php echo esc_url($bg); ?>);"<?php endif; ?>>
    <div class="auto-container">
        <h1><?php if($title) echo wp_kses_post($title); else wp_title(''); ?></h1>
        <?php echo wp_kses_post(consultox_get_the_breadcrumb()); ?>
    </div>
</section>
<!--End Page Title-->
<?php endif; ?>
<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer() ; ?>