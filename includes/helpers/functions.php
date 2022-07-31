<?php
/**

 * Functions Class include functions which are necessary for general functions of theme.

 *

 * @package   Functions-Package

 * @version   1.0

 * @link      http://themeforest.net/user/themearc

 * @author    Amir

 * @copyright Copyright (c) 2015, Amir

 * @license   GPL-2.0+
*/
class Bunch_Functions {

	

	function __construct()

	{

		add_action( '_bunch_logo', array( $this, 'logo' ), 10 );

		

		$options = get_option('consultox'.'_theme_options');

		

		if( isset($options['_enable_wp_login']) && !empty($options['_enable_wp_login']) ) {

			

			$this->wp_login_logo = $options['_wp_login_logo'];

			$this->wp_login_bg = $options['_wp_login_bg'];

			$this->wp_login_name = $options['_wp_login_page_title'];

			

			add_action( 'login_enqueue_scripts', array( $this, 'bunch_login_logo' ) );

			add_filter( 'login_headerurl', array( $this,  'bunch_login_logo_url' ) );

			add_filter( 'login_headertitle', array( $this, 'bunch_login_logo_url_title' ) );

			add_action( 'login_enqueue_scripts', array( $this, 'bunch_login_stylesheet' ) );

		}

	}

	

	

	/**

	 * Update the post views on visiting the post detail page.

	*/

	function post_views( $update = false )

	{

		global $post;

		

		if( !isset( $post->ID ) ) return;

		

		$key = '_bunch_'.$post->post_type.'_views';

		

		$views = get_post_meta( $post->ID, $key, true );

		

		if( $update ) {

			$new_views = ( $views ) ? ((int)$views + 1) : 1;

			

			update_post_meta( $post->ID, $key, $new_views );

		} 

		else $new_views = (int)$views;

		

		return $this->format_num( $new_views );

	}

	

	function format_num( $number )

	{

		return number_format( (int) $number, 0 );

	}

	

	function maintainance()

	{

		$options = _WSH()->option();

		

		if( isset($options['maintainance_status']) && !empty($options['maintainance_status']) ) {

			$m_page = $options['maintainance_status'];

			

			if( $m_page && !is_user_logged_in() && !is_page( $m_page ) ) {

				wp_redirect( get_permalink( $m_page ) );

			}

		}

	}

	

	function logo()

	{

		include _WSH()->includes( get_template_directory() . '/includes/modules/_bunch_logo.php');

	}

	

	

	function bunch_login_logo() { ?>

		<style type="text/css">

			body.login div#login h1 a {

				background-image: url(<?php echo esc_url( $this->wp_login_logo ); ?>);

				padding-bottom: 30px;

			}

			body.login { background-image: url(<?php echo esc_url( $this->wp_login_bg ); ?>); }

		</style>

	<?php }

	

	function bunch_login_stylesheet() {

		wp_enqueue_style( 'consultox_custom-login', get_template_directory_uri() . '/css/style-login.css' );

		

	}

	

	function bunch_login_logo_url() {

    	return esc_url(home_url('/'));

	}

	

	function bunch_login_logo_url_title() {

		return $this->wp_login_name;

	}

}

