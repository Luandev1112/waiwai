<div class="services-single">
    <div class="inner-box">
        <!--Image Gallery-->
        <div class="images-gallery">
            <div class="image">
                <img src="<?php echo esc_url($img); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
            </div>
        </div>
        <h2><?php echo wp_kses_post($title); ?></h2>
        <div class="text">
            <?php echo wp_kses_post($text); ?>
            <h3><?php echo wp_kses_post($title2); ?></h3>
            <p><?php echo wp_kses_post($text2); ?></p>
        </div>
        <div class="row clearfix">
            <?php foreach( $atts['how_it_work'] as $key => $item ): ?>
            <!--Services Block Five-->
            <div class="services-block-five col-md-6 col-sm-6 col-xs-12">
                <div class="inner">
                    <div class="icon-box">
                        <span class="icon <?php echo wp_kses_post($item->icon); ?>"></span>
                    </div>
                    <h4><a href="<?php echo wp_kses_post($item->url); ?>"><?php echo wp_kses_post($item->title); ?></a></h4>
                    <div class="services-text"><?php echo wp_kses_post($item->text); ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!--Two Column-->
        <div class="two-column">
            <h5><?php echo wp_kses_post($title3); ?></h5>
            <div class="row clearfix">
                
                <div class="accordian-column col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <!--Accordian Box / Style Three-->
                    <ul class="accordion-box style-three">
                        <?php foreach( $atts['why_choose_us'] as $key => $item ): ?>
                        <!--Block-->
                        <li class="accordion block <?php if($key == 1) { echo 'active-block'; } ?>">
                            <div class="acc-btn <?php if($key == 1) { echo 'active'; } ?>"><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div><?php echo wp_kses_post($item->title); ?></div>
                            <div class="acc-content <?php if($key == 1) { echo 'current'; } ?>">
                                <div class="content">
                                    <div class="text"><?php echo wp_kses_post($item->text); ?></div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <!--Accordian Box-->
                </div>
                
                <!--Image Column-->
                <div class="image-column col-lg-6 col-sm-12 col-sm-12 col-xs-12">
                    <div class="image">
                        <img src="<?php echo esc_url($img3); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                    </div>
                </div>
                
            </div>
        </div>
        
        <!--Benefits-->
        <div class="benefits">
            <h3><?php echo wp_kses_post($title5); ?></h3>
            <div class="benefit-text"><?php echo wp_kses_post($text5); ?></div>
            <div class="row clearfix">
                <div class="list-column col-md-12 col-sm-12 col-xs-12">
                    <ul class="list-style-six column-2-list">
                        <?php $fearures = explode("\n", ($text_list));
						foreach($fearures as $feature): ?>
						<li><?php echo wp_kses_post($feature); ?></li>
						<?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <!--Guarante Blocks-->
        <div class="guarante-blocks">
            <div class="row clearfix">
                <div class="content-column col-md-8 col-sm-8 col-xs-12">
                    <h3><?php echo wp_kses_post($title4); ?></h3>
                    <?php echo wp_kses_post($text4); ?>
                </div>
                <div class="image-column col-md-4 col-sm-4 col-xs-12">
                    <div class="image">
                        <img src="<?php echo esc_url($img4); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
