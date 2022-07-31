<?php $options = _WSH()->option();
	consultox_bunch_global_variable();
	$icon_href = (consultox_set( $options, 'site_favicon' )) ? consultox_set( $options, 'site_favicon' ) : get_template_directory_uri().'/images/favicon.ico';
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
	<link rel="shortcut icon" href="<?php echo esc_url($icon_href); ?>" type="image/x-icon">
	<link rel="icon" href="<?php echo esc_url($icon_href); ?>" type="image/x-icon">
<?php endif; ?>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="page-wrapper">
 	
    <?php if(consultox_set($options, 'preloader')): ?>
    <!-- Preloader -->
    <div class="preloader"></div>
	<?php endif; ?>

 	