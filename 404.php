<?php $options = _WSH()->option();
get_header();

$bg_img = (consultox_set($options, '404_page_bg')) ? consultox_set($options, '404_page_bg') : get_template_directory_uri().'/images/background/5.jpg'; ?>

<!--Error Section-->
<section class="error-section" style="background-image:url(<?php echo esc_url($bg_img); ?>)">
    <div class="auto-container">
        <div class="content">
            <h1><?php if(consultox_set($options, '404_page_title')) echo wp_kses_post(consultox_set($options, '404_page_title')); else esc_html_e('404', 'consultox'); ?></h1>
            <h2><?php if(consultox_set($options, '404_page_heading')) echo wp_kses_post(consultox_set($options, '404_page_heading')); else esc_html_e('Oops! That page can’t be found', 'consultox'); ?></h2>
            <div class="text"><?php if(consultox_set($options, '404_page_tag_line')) echo wp_kses_post(consultox_set($options, '404_page_tag_line')); else esc_html_e('Sorry, but the page you are looking for does not existing', 'consultox'); ?></div>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="theme-btn btn-style-two"><?php esc_html_e('Go to home page', 'consultox'); ?></a>
        </div>
    </div>
</section>
<!--End Error Section-->

<?php get_footer(); ?>