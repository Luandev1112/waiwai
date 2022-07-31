<!--Message Section-->
<section class="message-section">
    <div class="auto-container">
        <div class="sec-title-two">
            <div class="title"><?php echo wp_kses_post($title); ?></div>
            <h2><?php echo wp_kses_post($subtitle); ?></h2>
        </div>
        <div class="row clearfix">
            <div class="column col-md-6 col-sm-12 col-xs-12">
                <div class="text">
                    <?php echo wp_kses_post($text_left); ?>
                </div>
            </div>
            <div class="column col-md-6 col-sm-12 col-xs-12">
                <div class="text">
                    <?php echo wp_kses_post($text_right); ?>
                </div>
                <ul class="list-style-two">
                    <?php $fearures = explode("\n", ($text_list));
					foreach($fearures as $feature): ?>
					<li><?php echo wp_kses_post($feature); ?></li>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Message Section-->
