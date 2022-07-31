<?php $options = _WSH()->option();
consultox_bunch_global_variable(); ?>

<!-- Main Header-->
<header class="main-header header-style-two">

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
				<?php if(consultox_set($options, 'phone_v2')): ?>
				<!--Info Box-->
				<div class="upper-column info-box">
					<div class="icon-box"><span class="flaticon-technology-1"></span></div>
					<ul>
						<li><?php echo wp_kses_post(consultox_set($options, 'phone_v2')); ?></li>
					</ul>
				</div>
				<?php endif; if(consultox_set($options, 'free_enquiry_v2')): ?>
				<!--Info Box-->
				<div class="upper-column info-box">
					<div class="icon-box"><span class="flaticon-message"></span></div>
					<ul>
						<li><?php echo wp_kses_post(consultox_set($options, 'free_enquiry_v2')); ?></li>
					</ul>
				</div>
                <?php endif; if(consultox_set($options, 'request_callback_v2')): ?>
				<!--Info Box-->
				<div class="upper-column info-box">
					<a href="<?php echo esc_url(consultox_set($options, 'request_callback_v2')); ?>" class="theme-btn btn-style-two"><?php esc_html_e('Request a Call back', 'consultox'); ?></a>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!--End Header Upper-->
	
	<!--Header Lower-->
	<div class="header-lower">
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
						<button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flaticon-search"></span></button>
						<ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
							<li class="panel-outer">
								<div class="form-container">
									<?php echo get_template_part('searchform1'); ?>
								</div>
							</li>
						</ul>
					</div>
				</div>
				
                <?php if(consultox_set($options, 'head_social_v2')):
				if(consultox_set( $options, 'social_media' ) && is_array( consultox_set( $options, 'social_media' ) )): ?>
				<!-- Main Menu End-->
				<div class="outer-box">
					<ul class="social-icon-two">
						<?php $social_icons = consultox_set( $options, 'social_media' );
						foreach( consultox_set( $social_icons, 'social_media' ) as $social_icon ):
						if( isset( $social_icon['tocopy' ] ) ) continue; ?>
						<li><a href="<?php echo esc_url(consultox_set( $social_icon, 'social_link')); ?>" target="_blank"><i class="fa <?php echo esc_attr(consultox_set( $social_icon, 'social_icon')); ?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
                <?php endif; endif; ?>
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
