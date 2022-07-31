<?php if($slider_slug): ?>
<!--Main Slider-->
<section class="main-slider">
    <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
        <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
			<?php if( ($slider_slug) && function_exists ( 'putRevSlider' ) ) putRevSlider( $slider_slug ); ?>
		</div>
	</div>
</section>
<!--End Main Slider-->
<?php endif; ?>