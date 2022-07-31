<?php
///----Blog widgets---

//Recent Post
class Bunch_Recent_News extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Recent_News', /* Name */esc_html__('Consultox Recent News','consultox'), array( 'description' => esc_html__('Show the recent news sidebar', 'consultox' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Popular Posts -->
        <div class="popular-posts">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            
            <?php $query_string = 'posts_per_page='.$instance['number'];
			if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
			 
			$this->posts($query_string);  ?>
		</div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent News', 'consultox');
		$number = ( $instance ) ? esc_attr($instance['number']) : 4;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : ''; ?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'consultox'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'consultox'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'consultox'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'consultox'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
            <!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); ?>
            <article class="post">
                <figure class="post-thumb"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_post_thumbnail('consultox_70x62'); ?></a></figure>
                <div class="text"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php echo wp_trim_words( get_the_title(), 4, '...' ); ?></a></div>
                <div class="post-info"><?php echo get_the_date('d M. Y'); ?></div>
            </article>
            <?php endwhile;
		endif;
		wp_reset_postdata();
    }
}

//Services Menu
class Bunch_Services_Menu extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Services_Menu', /* Name */esc_html__('Consultox Services Menu','consultox'), array( 'description' => esc_html__('Show services menu in sidebar.', 'consultox' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Blog Category Widget-->
        <div class="sidebar-blog-category">
            <ul class="blog-cat">
                <?php $args = array('post_type' => 'bunch_services', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'services_category','field' => 'id','terms' => (array)$instance['cat']));
					 
					$this->posts($args); 
				?>
            </ul>
		</div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 7;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : ''; ?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'consultox'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'consultox'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'consultox'), 'selected'=>$cat, 'taxonomy' => 'services_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		$query = new WP_Query($args);
		if( $query->have_posts() ):
		while( $query->have_posts() ): $query->the_post();
		$services_meta = _WSH()->get_meta(); ?>
        <li><a href="<?php echo esc_url(consultox_set($services_meta, 'ext_url')); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; endif;
		wp_reset_postdata();
    }
}

//Our Brochures
class Bunch_Brochures extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Brochures', /* Name */esc_html__('Consultox Our Brochures','consultox'), array( 'description' => esc_html__('Show the info Our Brochures', 'consultox' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
      		
            <!--Brochure-->
            <div class="brochure-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="brochure-box">
                    <div class="inner">
                        <span class="icon fa fa-file-pdf-o"></span>
                        <div class="text"><?php esc_html_e('Download Pdf.', 'consultox'); ?></div>
                    </div>
                    <a href="<?php echo esc_url($instance['pdf']); ?>" class="overlay-link"></a>
                </div>
                <div class="brochure-box">
                    <div class="inner">
                        <span class="icon flaticon-file-1"></span>
                        <div class="text"><?php esc_html_e('Download Doc.', 'consultox'); ?></div>
                    </div>
                    <a href="<?php echo esc_url($instance['word']); ?>" class="overlay-link"></a>
                </div>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['pdf'] = $new_instance['pdf'];
		$instance['word'] = $new_instance['word'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Our Brochures', 'consultox');
		$pdf = ( $instance ) ? esc_attr($instance['pdf']) : '#';
		$word = ($instance) ? esc_attr($instance['word']) : '#';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'consultox'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf')); ?>"><?php esc_html_e('PDF Link:', 'consultox'); ?></label>
            <input placeholder="<?php esc_html_e('PDF link here', 'consultox'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf')); ?>" type="text" value="<?php echo esc_attr($pdf); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('word')); ?>"><?php esc_html_e('Work Doc Link:', 'consultox'); ?></label>
            <input placeholder="<?php esc_html_e('Word link here', 'consultox'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('word')); ?>" name="<?php echo esc_attr($this->get_field_name('word')); ?>" type="text" value="<?php echo esc_attr($word); ?>" />
        </p>
                
		<?php 
	}
	
}

//Get In Touch
class Bunch_Get_In_Touch extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Get_In_Touch', /* Name */esc_html__('Consultox Get In Touch','consultox'), array( 'description' => esc_html__('Show the information about company', 'consultox' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$options = _WSH()->option();
		echo wp_kses_post($before_widget); ?>
        	
            <!--Contact Widhet-->
            <div class="contact-info-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="inner-box">
                    <ul>
                        <li><span class="icon flaticon-technology-1"></span><?php esc_html_e('Phone:', 'consultox'); ?><br> <?php echo wp_kses_post($instance['phone']); ?></li>
                        <li><span class="icon fa fa-send"></span><?php esc_html_e('Email:', 'consultox'); ?><br> <?php echo sanitize_email($instance['email']); ?></li>
                    </ul>
                </div>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : 'Get In Touch';
		$phone = ( $instance ) ? esc_attr($instance['phone']) : '1800 456 7890';
		$email = ( $instance ) ? esc_attr($instance['email']) : 'contact@consultox.com';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'consultox'); ?></label>
            <input placeholder="<?php esc_html_e('Title', 'consultox'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'consultox'); ?></label>
            <input placeholder="<?php esc_html_e('Phone', 'consultox'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'consultox'); ?></label>
            <input placeholder="<?php esc_html_e('Email', 'consultox'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>
        
		<?php 
	}
	
}

///----footer widgets---
//About Us
class Bunch_About_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_About_Us', /* Name */esc_html__('Consultox About Us','consultox'), array( 'description' => esc_html__('Show the information about company', 'consultox' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$options = _WSH()->option();
		echo wp_kses_post($before_widget); ?>
      		
        <!--Footer Column-->
        <div class="logo-widget">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo wp_kses_post($instance['logo_image']); ?>" alt="<?php esc_attr_e('image', 'consultox'); ?>" /></a>
            </div>
            <div class="number"><?php echo wp_kses_post($instance['phone']); ?></div>
            <div class="text"><?php echo sanitize_email($instance['email']); ?> <br> <?php echo wp_kses_post($instance['address']); ?></div>
        </div>
        
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['logo_image'] = $new_instance['logo_image'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		$instance['address'] = $new_instance['address'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_image = ( $instance ) ? esc_attr($instance['logo_image']) : get_template_directory_uri().'/images/footer-logo.png';
		$phone = ( $instance ) ? esc_attr($instance['phone']) : '(1800) 574 9687';
		$email = ( $instance ) ? esc_attr($instance['email']) : 'contact@consultox.com';
		$address = ( $instance ) ? esc_attr($instance['address']) : '89, Avenue 547, New Youk, MAC 5245';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_image')); ?>"><?php esc_html_e('Logo Image:', 'consultox'); ?></label>
            <input placeholder="<?php esc_html_e('logo link here', 'consultox'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_image')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_image')); ?>" type="text" value="<?php echo esc_attr($logo_image); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'consultox'); ?></label>
            <input placeholder="<?php esc_html_e('Phone', 'consultox'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'consultox'); ?></label>
            <input placeholder="<?php esc_html_e('Email', 'consultox'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'consultox'); ?></label>
            <input placeholder="<?php esc_html_e('Address', 'consultox'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
        </p>
        
		<?php 
	}
	
}

//NewsLetter
class Bunch_NewsLetter extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_NewsLetter', /* Name */esc_html__('Consultox NewsLetter','consultox'), array( 'description' => esc_html__('Show the Newsletter', 'consultox' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <div class="newsletter-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
                <div class="emailed-form">
                    <form action="http://feedburner.google.com/fb/a/mailverify">
                        <div class="form-group">
                        	<input type="hidden" id="uri2" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
                            <input type="email" name="email" placeholder="<?php esc_html_e('Enter your email address', 'consultox'); ?>">
                            <button type="submit" class="theme-btn"><span class="flaticon-send-message-button"></span></button>
                        </div>
                    </form>
                </div>
                
                <?php if( $instance['show'] ): ?>
                <ul class="social-icon-one">
                	<?php echo wp_kses_post(consultox_get_social_icons()); ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['id'] = $new_instance['id'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Newsletter', 'consultox');
		$content = ( $instance ) ? esc_attr($instance['content']) : 'Get latest updates and offers.';
		$id = ( $instance ) ? esc_attr($instance['id']) : '#';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'consultox'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'consultox'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Newsletter ID: ', 'consultox'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr( $id ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'consultox'); ?></label>
   			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
            
		<?php 
	}
	
}

?>