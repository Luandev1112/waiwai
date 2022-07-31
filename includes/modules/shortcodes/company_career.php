<div class="careers-single">
    <div class="inner-box">
        <h2><?php echo wp_kses_post($title); ?></h2>
        <div class="text"><?php echo wp_kses_post($text); ?></div>
        <ul class="list-style-three">
            <?php $fearures = explode("\n", ($text_list));
			foreach($fearures as $feature): ?>
			<li><?php echo wp_kses_post($feature); ?></li>
			<?php endforeach; ?>
        </ul>
        
        <h3><?php echo wp_kses_post($title1); ?></h3>
        <!--Accordian Box-->
        <ul class="accordion-box style-two">
            <?php foreach( $atts['company_career'] as $key => $item ): ?>
            <!--Block-->
            <li class="accordion block <?php if($key == 1) { echo 'active-block'; } ?>">
                <div class="acc-btn <?php if($key == 1) { echo 'active'; } ?>"><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div><?php echo wp_kses_post($item->title); ?></div>
                <div class="acc-content <?php if($key == 1) { echo 'current'; } ?>">
                    <div class="content">
                    	<?php echo wp_kses_post($item->text); ?>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <!--Accordian Box-->
        
        <div class="download-box">
            <h4><?php echo wp_kses_post($download_text); ?></h4>
            <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-two"><?php echo wp_kses_post($btn_title); ?></a>
        </div>
    </div>
</div>
