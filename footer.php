<?php $options = get_option('consultox'.'_theme_options'); ?>
	<div class="clearfix"></div>
    
    <!--Main Footer-->
    <footer class="main-footer">
		<div class="auto-container">
        	<!--Widgets Section-->
            <?php if ( is_active_sidebar( 'footer-sidebar' )): ?>
            <div class="widgets-section">
            	<div class="row clearfix">
                	<?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div>
            <?php endif;?>
        </div>
        <!--Footer Bottom-->
        <div class="footer-bottom">
        	<div class="auto-container">
            	<div class="copyright"><?php echo wp_kses_post(consultox_set($options, 'footer_copyrights')); ?></div>
            </div>
        </div>
    </footer>
    <!--End Main Footer-->
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<?php wp_footer(); ?>
</body>
</html>