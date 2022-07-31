<?php
/**
 * Enqueu Class include functions which are necessary for enqueuing styles and scripts..
 *
 * @package   Enqueue-Package
 * @version   1.0
 * @link      http://themeforest.net/user/themearc
 * @author    Amir
 * @copyright Copyright (c) 2015, Amir
 * @license   GPL-2.0+
*/
class Bunch_Enqueue
{
	
	function __construct()
	{
		add_action( 'wp_enqueue_scripts', array( $this, 'bunch_enqueue_scripts' ) );
		add_action( 'wp_head', array( $this, 'wp_head' ) );
		add_action( 'wp_footer', array( $this, 'wp_footer' ) );
	}
	function bunch_enqueue_scripts()
	{
		global $post, $wp_query;
		$options = _WSH()->option();
		$current_theme = wp_get_theme();
		$header_style = consultox_set( $options, 'header_style' );
		
 
		$version = $current_theme->get( 'Version' );
		
		$dark_color = ( consultox_set( $options, 'website_theme' ) == 'dark' ) ? true : false;
		
		$dark_color = ( consultox_set( $_GET, 'color_style' ) == 'dark' ) ? true : $dark_color;
		
		if(consultox_set($options, 'color_scheme') == 'color2') : $color = 'css/color2.css'; else: $color = 'css/color1.css'; endif;	
		
		$protocol = is_ssl() ? 'https' : 'http';
		$styles = array();
		
		$scripts = array();
		
		if( is_single() ) {
			$format = get_post_format();
			if( $format == 'gallery' ) wp_enqueue_script( array( 'consultox_jquery-flexslider' ) );
			if( $format == 'video' || $format == 'audio' ) wp_enqueue_script( array( 'consultox_jquery-fitvids' ) );
		}
		if( is_singular( 'bunch_projects' ) || $wp_query->is_posts_page || is_search() || is_tag() || is_category() || is_author() || is_archive() ) 
  		wp_enqueue_script( array('consultox_jquery-flexslider', 'consultox_owl.carousel', 'consultox_jquery-fitvids') );
		wp_enqueue_script( array('consultox_custom_script') );
		
		wp_add_inline_style( 'consultox-main-style', $this->wp_head() );
		$opt = _WSH()->option();
		$h_js = 'if( ajaxurl === undefined ) var ajaxurl = "'.esc_url( admin_url( 'admin-ajax.php' ) ).'";';
		wp_add_inline_script( 'consultox-main-script', $h_js );
		
		
	}
	
	function consultox_get_font_settings( $styles )
	{
		$opt = _WSH()->option();
		$protocol = ( is_ssl() ) ? 'https' : 'http';
		$font = array();
		
		if( consultox_set( $opt, 'use_custom_font' ) ){
			
			if( $h1 = consultox_set( $opt, 'h1_font_family' ) ) $font[$h1] = urlencode( $h1 ).':400,300,600,700,800';
			if( $h2 = consultox_set( $opt, 'h2_font_family' ) ) $font[$h2] = urlencode( $h2 ).':400,300,600,700,800';
			if( $h3 = consultox_set( $opt, 'h3_font_family' ) ) $font[$h3] = urlencode( $h3 ).':400,300,600,700,800';
		}
		
		if( consultox_set( $opt, 'body_custom_font' ) ){
			if( $body = consultox_set( $opt, 'body_font_family' ) ) $font[$body] = urlencode( $body ).':400,300,600,700,800';
		}
		
		if( $font ) $styles['bunch_google_custom_font'] = $protocol.'://fonts.googleapis.com/css?family='.implode('|', $font);
		
		return $styles;
	}
	
	function wp_head()
	{
		$opt = _WSH()->option();
		
			$style = '';
		if ( consultox_set( $opt, 'body_custom_font' ) ) {
		    $style .= bunch_get_font_settings( array( 'body_font_size' => 'font-size', 'body_font_family' => 'font-family', 'body_font_style' => 'font-style', 'body_font_color' => 'color', 'body_line_height' => 'line-height' ), 'body, p {', '}' );
		}

		if ( consultox_set( $opt, 'use_custom_font' ) ) {
		    $style .= bunch_get_font_settings( array( 'h1_font_size' => 'font-size', 'h1_font_family' => 'font-family', 'h1_font_style' => 'font-style', 'h1_font_color' => 'color', 'h1_line_height' => 'line-height' ), 'h1 {', '}' );
		    $style .= bunch_get_font_settings( array( 'h2_font_size' => 'font-size', 'h2_font_family' => 'font-family', 'h2_font_style' => 'font-style', 'h2_font_color' => 'color', 'h2_line_height' => 'line-height' ), 'h2 {', '}' );
		    $style .= bunch_get_font_settings( array( 'h3_font_size' => 'font-size', 'h3_font_family' => 'font-family', 'h3_font_style' => 'font-style', 'h3_font_color' => 'color', 'h3_line_height' => 'line-height' ), 'h3 {', '}' );
		    $style .= bunch_get_font_settings( array( 'h4_font_size' => 'font-size', 'h4_font_family' => 'font-family', 'h4_font_style' => 'font-style', 'h4_font_color' => 'color', 'h4_line_height' => 'line-height' ), 'h4 {', '}' );
		    $style .= bunch_get_font_settings( array( 'h5_font_size' => 'font-size', 'h5_font_family' => 'font-family', 'h5_font_style' => 'font-style', 'h5_font_color' => 'color', 'h5_line_height' => 'line-height' ), 'h5 {', '}' );
		    $style .= bunch_get_font_settings( array( 'h6_font_size' => 'font-size', 'h6_font_family' => 'font-family', 'h6_font_style' => 'font-style', 'h6_font_color' => 'color', 'h6_line_height' => 'line-height' ), 'h6 {', '}' );
		}

		$style .= consultox_set( $opt, 'header_css' );
		
		return $style;
	}
	
	function wp_footer()
	{
	}
}