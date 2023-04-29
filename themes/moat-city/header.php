<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */



?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<!-- google font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
   <!--  <link rel="shortcut icon" type="images/x-icon" href="<?php //echo BASEURL?>/images/favicon.ico"/> -->
    <?php 
	if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> <?php 
	endif; 
	wp_head(); 
    ?>

    
</head> 
<?php
$tell = get_option('mobile_no');
?>
<!-- Scroll To Top Button -->
<div class="go-top go-top-button active">
	<i class="fa fa-long-arrow-up"></i>
	<i class="fa fa-long-arrow-up"></i>
</div>

<!-- Header Start Here -->
<header class="headerMain">
	<div class="container">
		<nav class="navbar navbar-expand-lg justify-content-between"> 
			<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				$logo_image_url =  $image[0];
				if($logo_image_url != '') {?>
				<a href="<?php echo get_home_url(); ?>" class="navbar-brand">
					<img src="<?php echo $logo_image_url; ?>" alt="<?=get_bloginfo()?>" title="<?=get_bloginfo()?>" />
				</a>
				<?php
				}
			?>
			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
				<?php
					wp_nav_menu( array(
					'menu'              => 'Main Menu',
					'theme_location'    => 'primary',
					'container'         => true,
					'menu_class' => 'navbar-nav',  
					));
				?>
			</div>  
			
			
			<div class="hbtn">
				<div class="hphone-icon">
					<a href="tel:<?php echo $tell;?>"><img src="<?php echo BASEURL;?>/images/hphone.png" alt=""></a>
				</div> 
				<div class="call-info">
					<span>Call Now</span>
					<a href="tel:<?php echo $tell;?>">
						<?php echo $tell;?>
					</a>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			</div>
		</nav>
	</div>
</header>  
<body <?php body_class(); ?>>
