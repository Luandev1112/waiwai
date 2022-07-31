<?php /* Template Name: Coming Soon Page */
	$options = _WSH()->option();
	get_header('coming_soon');
?>

<?php while( have_posts() ): the_post(); ?>

<!--Comming Soon-->
<section class="comming-soon" style="background-image:url(<?php echo esc_url(consultox_set($options, 'coming_soon_bg')); ?>)">
    <div class="auto-container">
        <div class="content">
            <div class="content-inner">
                <h2><?php echo wp_kses_post(consultox_set($options, 'coming_soon_title')); ?></h2>
                <?php $date = consultox_set($options, 'coming_soon_date');
				$month = consultox_set($options, 'coming_soon_month');
				$year = consultox_set($options, 'coming_soon_year'); ?>
                <div class="time-counter"><div class="time-countdown clearfix" data-countdown="<?php echo wp_kses_post($year); ?>/<?php echo wp_kses_post($month); ?>/<?php echo wp_kses_post($date); ?>"></div></div>
                <div class="text"><?php echo wp_kses_post(consultox_set($options, 'coming_soon_text')); ?></div>
                <!--Emailed Form-->
                <div class="emailed-form">
                    <form action="http://feedburner.google.com/fb/a/mailverify">
                        <div class="form-group">
                        	<input type="hidden" id="uri2" name="uri" value="<?php echo esc_url(consultox_set($options, 'cs_newsletter_id')); ?>">
                            <input type="email" name="email" placeholder="<?php esc_html_e('Enter your email address', 'consultox'); ?>">
                            <button type="submit" class="theme-btn"><?php esc_html_e('Submit now', 'consultox'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Comming Soon-->

<?php endwhile; ?>

<?php get_footer('coming_soon') ; ?>