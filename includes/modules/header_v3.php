<?php $options = _WSH()->option();
consultox_bunch_global_variable(); ?>

<!-- Main Header-->
<header class="main-header header-style-three">
	
	<!-- Header Top -->
	<div class="header-top">
		<div class="auto-container">
			<div class="clearfix">
				<!--Top Left-->
				<div class="top-left">
					<div class="text"><?php echo wp_kses_post(consultox_set($options, 'welcome_note')); ?></div>
				</div>
				
                <?php if(consultox_set($options, 'head_social_v3')):
				if(consultox_set( $options, 'social_media' ) && is_array( consultox_set( $options, 'social_media' ) )): ?>
				<!--Top Right-->
				<div class="top-right clearfix">
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
				</div>
				<?php endif; endif; ?>
			</div>
		</div>
	</div>
	<!-- Header Top End -->
	
	<!--Header-Upper-->
	<div class="header-upper">
		<div class="auto-container clearfix">
			
			<div class="pull-left logo-outer">
				<div class="logo">
                	<?php if(consultox_set($options, 'logo_image')): ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(consultox_set($options, 'logo_image')); ?>" alt="<?php esc_html_e('Arctica', 'consultox'); ?>" title="<?php esc_html_e('Arctica', 'consultox'); ?>"></a>
                    <?php else: ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo.png'); ?>" alt="<?php esc_html_e('Arctica', 'consultox'); ?>"></a>
                    <?php endif; ?>
                </div>
			</div>
				
			<div class="pull-right upper-right clearfix">
				<?php if(consultox_set($options, 'address_v3')): ?>
				<!--Info Box-->
				<div class="upper-column info-box">
					<div class="icon-box"><span class="flaticon-location-pin"></span></div>
					<ul>
						<li><?php echo wp_kses_post(consultox_set($options, 'address_v3')); ?></li>
					</ul>
				</div>
				<?php endif; if(consultox_set($options, 'phone_v3')): ?>
				<!--Info Box-->
				<div class="upper-column info-box">
					<div class="icon-box"><span class="flaticon-technology-1"></span></div>
					<ul>
						<li><?php echo wp_kses_post(consultox_set($options, 'phone_v3')); ?></li>
					</ul>
				</div>
				<?php endif; if(consultox_set($options, 'open_hours_v3')): ?>
				<!--Info Box-->
				<div class="upper-column info-box">
					<div class="icon-box"><span class="flaticon-timer"></span></div>
					<ul>
						<li><?php echo wp_kses_post(consultox_set($options, 'open_hours_v3')); ?></li>
					</ul>
				</div>
				<?php endif; ?>
			</div>
			
		</div>
	</div>
	<!--End Header Upper-->
	
	<!--Header Lower-->
	<div class="header-lower clearfix">
		<div class="auto-container">
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
				
				<!--Search Box-->
				<div class="search-box-outer">
					<div class="dropdown">
						<button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
						<ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
							<li class="panel-outer">
								<div class="form-container">
									<?php echo get_template_part('searchform1'); ?>
								</div>
							</li>
						</ul>
					</div>
				</div>
                
				<?php if(consultox_set($options, 'request_callback_v3')): ?>
				<!-- Main Menu End-->
				<div class="outer-box">
					<a href="<?php echo esc_url(consultox_set($options, 'request_callback_v3')); ?>" class="theme-btn btn-style-six"><?php esc_html_e('Request a Call back', 'consultox'); ?></a>
				</div>
                <?php endif; ?>
			</div>
		</div>
	</div>
	<!--End Header Lower-->
	
	<!--Sticky Header-->
	<div class="sticky-header">
		<div class="auto-container clearfix">
			<!--Logo-->
			<div class="logo pull-left">
            	<?php if(consultox_set($options, 'logo_sticky')): ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(consultox_set($options, 'logo_sticky')); ?>" alt="<?php esc_html_e('Arctica', 'consultox'); ?>" title="<?php esc_html_e('Arctica', 'consultox'); ?>" class="img-responsive"></a>
				<?php else: ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo-small.png'); ?>" alt="<?php esc_html_e('Arctica', 'consultox'); ?>" class="img-responsive"></a>
				<?php endif; ?>
			</div>
			<!--Right Col-->
			<div class="right-col pull-right">
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
				
				<!--Search Box-->
				<div class="search-box-outer">
					<div class="dropdown">
						<button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
						<ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu4">
							<li class="panel-outer">
								<div class="form-container">
									<?php echo get_template_part('searchform2'); ?>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Sticky Header-->

</header>
<!--End Main Header -->
