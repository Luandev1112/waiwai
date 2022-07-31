<!--News Block Three-->
<div class="news-block-three style-two">
    <div class="inner-box">
        <?php if( has_post_thumbnail() ):?>
        <div class="image">
            <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_post_thumbnail('consultox_1170x500'); ?></a>
        </div>
        <?php endif;?>
        <div class="lower-content">
            <div class="upper-box clearfix">
                <div class="posted-date pull-left"><?php echo get_the_date(); ?></div>
                <ul class="post-meta pull-right">
                    <li><?php esc_html_e('By:', 'consultox'); ?> <?php the_author(); ?></li>
                    <?php $term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names")); ?>
                    <?php if($term_list):?>
                    <li><?php echo implode( ', ', (array)$term_list ); ?></li>
                    <?php endif;?>
                    <li><?php comments_number( wp_kses_post(__('0 Comments' , 'consultox')), wp_kses_post(__('1 Comment' , 'consultox')), wp_kses_post(__('% Comments' , 'consultox'))); ?></li>
               	</ul>
            </div>
            <div class="lower-box">
                <h3><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                <div class="text"><?php the_excerpt(); ?></div>
                <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="theme-btn btn-style-two read-more"><?php esc_html_e('Read more', 'consultox'); ?></a>
            </div>
        </div>
    </div>
</div>
