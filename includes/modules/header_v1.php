<?php $options = _WSH()->option();
consultox_bunch_global_variable(); ?>

<!-- Main Header-->
<header class="main-header">

	<!-- Header Top -->
    <?php if( consultox_set($options, 'show_topbar') ):?>
	<div class="header-top">
		<div class="auto-container">
			<div class="clearfix">
				<!--Top Left-->
				<div class="top-left">
					<ul class="links clearfix">
                    	<?php if(consultox_set($options, 'phone_v1')): ?>
						<li><a href="#"><span class="icon flaticon-technology-1"></span><?php echo wp_kses_post(consultox_set($options, 'phone_v1')); ?></a></li>
                        <?php endif; if(consultox_set($options, 'email_v1')): ?>
						<li><a href="#"><span class="icon flaticon-message"></span><?php echo sanitize_email(consultox_set($options, 'email_v1')); ?></a></li>
                        <?php endif; ?>
					</ul>
				</div>
				
				<!--Top Right-->
				<div class="top-right clearfix">
                	<?php if(consultox_set($options, 'head_social_v1')):
					if(consultox_set( $options, 'social_media' ) && is_array( consultox_set( $options, 'social_media' ) )): ?>
					<!--social-icon-->
					<div class="social-icon">
						<ul class="clearfix">
							<?php $social_icons = consultox_set( $options, 'social_media' );
							foreach( consultox_set( $social_icons, 'social_media' ) as $social_icon ):
							if( isset( $social_icon['tocopy' ] ) ) continue; ?>
							<li><a href="<?php echo esc_url(consultox_set( $social_icon, 'social_link')); ?>"><span class="fa <?php echo esc_attr(consultox_set( $social_icon, 'social_icon')); ?>"></span></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; endif; ?>
                    
                    <?php if(consultox_set($options, 'language_switcher_v1')): ?>
					<!--Language-->
					<div class="language dropdown">
                    	<?php do_action('wpml_add_language_selector'); ?>
					</div>
                    <?php endif;?>
				</div>
			</div>
		</div>
	</div>
    <?php endif;?>
	<!-- Header Top End -->
	
	<!-- Main Box -->
	<div class="main-box">
		<div class="auto-container">
			<div class="outer-container clearfix">
				<!--Logo Box-->
				<div class="logo-box">
					<div class="logo">
                    	<?php if(consultox_set($options, 'logo_image')): ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(consultox_set($options, 'logo_image')); ?>" alt="<?php esc_html_e('Arctica', 'consultox'); ?>" title="<?php esc_html_e('Arctica', 'consultox'); ?>"></a>
                        <?php else: ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo.png'); ?>" alt="<?php esc_html_e('Arctica', 'consultox'); ?>"></a>
                        <?php endif; ?>
                    </div>
				</div>
				<!--Nav Outer-->
				<div class="nav-outer clearfix">
					<!-- Main Menu -->
					<nav class="main-menu">
						<div class="navbar-header">
							<!-- Toggle Button -->    	
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
						<div class="navbar-collapse collapse clearfix">
							<ul class="navigation clearfix">
								<?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
									'container_class'=>'navbar-collapse collapse navbar-right',
									'menu_class'=>'nav navbar-nav',
									'fallback_cb'=>false, 
									'items_wrap' => '%3$s', 
									'container'=>false,
									'depth' => 3,
									'walker'=> new Bunch_Bootstrap_walker()  
								) ); ?>
							 </ul>
						</div>
					</nav>
					<!-- Main Menu End-->
				</div>
				<!--Nav Outer End-->
			</div>    
		</div>
	</div>

</header>
<!--End Main Header -->
