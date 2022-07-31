<?php add_action('after_setup_theme', 'consultox_bunch_theme_setup');
function consultox_bunch_theme_setup()
{
	global $wp_version;
	if(!defined('CONSULTOX_VERSION')) define('CONSULTOX_VERSION', '1.0');
	if( !defined( 'CONSULTOX_ROOT' ) ) define('CONSULTOX_ROOT', get_template_directory().'/');
	if( !defined( 'CONSULTOX_URL' ) ) define('CONSULTOX_URL', get_template_directory_uri().'/');	
	include_once get_template_directory() . '/includes/loader.php';
	
	
	load_theme_textdomain('consultox', get_template_directory() . '/languages');
	
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( "title-tag" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'consultox'),
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 960;
	add_image_size( 'consultox_370x190', 370, 190, true ); //'370x190 Welcome Services'
	add_image_size( 'consultox_384x295', 384, 295, true ); //'384x295 Our Cases 1'
	add_image_size( 'consultox_94x94', 94, 94, true ); //'94x94 Testimonials 1'
	add_image_size( 'consultox_270x224', 270, 224, true ); //'270x224 Our Cases 2'
	add_image_size( 'consultox_270x286', 270, 286, true ); //'270x286 Our Advisor 1'
	add_image_size( 'consultox_270x284', 270, 284, true ); //'270x284 What We Do'
	add_image_size( 'consultox_370x260', 370, 260, true ); //'370x260 Projects 3 Column'
	add_image_size( 'consultox_270x260', 270, 260, true ); //'270x260 Projects 4 Column'
	add_image_size( 'consultox_348x260', 348, 260, true ); //'348x260 Projects Fullwidth'
	add_image_size( 'consultox_570x360', 570, 360, true ); //'570x360 Blog Grid'
	add_image_size( 'consultox_840x360', 840, 360, true ); //'840x360 Blog'
	add_image_size( 'consultox_70x62', 70, 62, true ); //'70x62 Recent news'
}

function consultox_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'strong yellow', 'consultox' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => __( 'strong white', 'consultox' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => __( 'light black', 'consultox' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => __( 'very light gray', 'consultox' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => __( 'very dark black', 'consultox' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'Small', 'consultox' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => __( 'Normal', 'consultox' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => __( 'Large', 'consultox' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => __( 'Huge', 'consultox' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'consultox_gutenberg_editor_palette_styles' );

function consultox_bunch_widget_init()
{
	global $wp_registered_sidebars;
	$theme_options = _WSH()->option();
	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'consultox' ),
	  'id' => 'default-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'consultox' ),
	  'before_widget'=>'<div id="%1$s" class="widget blog-sidebar sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h2>',
	  'after_title' => '</h2></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'consultox' ),
	  'id' => 'footer-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'consultox' ),
	  'before_widget'=>'<div id="%1$s" class="col-md-3 col-sm-6 col-xs-12 column footer-column footer-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h2>',
	  'after_title' => '</h2>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'consultox' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'consultox' ),
	  'before_widget'=>'<div id="%1$s" class="widget blog-sidebar sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h2>',
	  'after_title' => '</h2></div>'
	));
	if( !is_object( _WSH() )  )  return;
	$sidebars = consultox_set(consultox_set( $theme_options, 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 
	foreach( array_filter((array)$sidebars) as $sidebar)
	{
		if(consultox_set($sidebar , 'topcopy')) continue ;
		
		$name = consultox_set( $sidebar, 'sidebar_name' );
		
		if( ! $name ) continue;
		$slug = consultox_bunch_slug( $name ) ;
		
		register_sidebar( array(
			'name' => $name,
			'id' =>  sanitize_title( $slug ) ,
			'before_widget' => '<div id="%1$s" class="sidebar widget sidebar-widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<div class="sidebar-title"><h2>',
			'after_title' => '</h2></div>',
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action( 'widgets_init', 'consultox_bunch_widget_init' );

// Update items in cart via AJAX
function consultox_load_head_scripts() {
	$options = _WSH()->option();
    if ( !is_admin() ) {
		$protocol = is_ssl() ? 'https://' : 'http://';
		if(consultox_set($options, 'map_api_key')){
		$map_path = '?key='.consultox_set($options, 'map_api_key');
		wp_enqueue_script( 'consultox-map-api', ''.$protocol.'maps.google.com/maps/api/js'.$map_path, array(), false, false );
		wp_enqueue_script( 'consultox-googlemap', get_template_directory_uri().'/js/map-script.js', array(), false, false );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'consultox_load_head_scripts' );

//global variables
function consultox_bunch_global_variable() {
    global $wp_query;
}

function consultox_enqueue_scripts() {
    //styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'hover', get_template_directory_uri() . '/css/hover.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/css/jquery-ui.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );
	wp_enqueue_style( 'consultox-main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'consultox-custom-style', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'consultox-gutenberg', get_template_directory_uri() . '/css/gutenberg.css' );
	wp_enqueue_style( 'consultox-responsive', get_template_directory_uri() . '/css/responsive.css' );
	
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'fancybox-pack', get_template_directory_uri().'/js/jquery.fancybox.pack.js', array(), false, true );
	wp_enqueue_script( 'fancybox-media', get_template_directory_uri().'/js/jquery.fancybox-media.js', array(), false, true );
	wp_enqueue_script( 'wow-custom', get_template_directory_uri().'/js/wow-custom.js', array(), false, true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/js/owl.js', array(), false, true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.js', array(), false, true );
	wp_enqueue_script( 'countdown', get_template_directory_uri().'/js/jquery.countdown.js', array(), false, true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri().'/js/mixitup.js', array(), false, true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/js/appear.js', array(), false, true );
	wp_enqueue_script( 'consultox-main-script', get_template_directory_uri().'/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'consultox_enqueue_scripts' );

/*-------------------------------------------------------------*/
function consultox_theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'consultox' );
	$montserrat = _x( 'on', 'Montserrat font: on or off', 'consultox' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'consultox' );
    $playfair = _x( 'on', 'Playfair Display font: on or off', 'consultox' );
    $poppins = _x( 'on', 'Poppins font: on or off', 'consultox' );
 
    if ( 'off' !== $lato || 'off' !== $montserrat || 'off' !== $open_sans || 'off' !== $playfair || 'off' !== $poppins ) {
        $font_families = array();
 
        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
        }
		
		if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
        }
		
		if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
        }
		
		if ( 'off' !== $playfair ) {
            $font_families[] = 'Playfair Display:400,400i,700,700i,900,900i';
        }
		
		if ( 'off' !== $poppins ) {
            $font_families[] = 'Poppins:300,400,500,600,700,800,900';
        }
 
        $opt = get_option('consultox'.'_theme_options');
		if ( consultox_set( $opt, 'body_custom_font' ) ) {
			if ( $custom_font = consultox_set( $opt, 'body_font_family' ) )
				$font_families[] = $custom_font . ':300,300i,400,400i,600,700';
		}
		if ( consultox_set( $opt, 'use_custom_font' ) ) {
			$font_families[] = consultox_set( $opt, 'h1_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = consultox_set( $opt, 'h2_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = consultox_set( $opt, 'h3_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = consultox_set( $opt, 'h4_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = consultox_set( $opt, 'h5_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = consultox_set( $opt, 'h6_font_family' ) . ':300,300i,400,400i,600,700';
		}
		$font_families = array_unique( $font_families);
        
		$query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}
function consultox_theme_slug_scripts_styles() {
    wp_enqueue_style( 'consultox-theme-slug-fonts', consultox_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'consultox_theme_slug_scripts_styles' );
/*---------------------------------------------------------------------*/
function consultox_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'consultox_add_editor_styles' );
