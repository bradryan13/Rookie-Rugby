<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package USA Wheel Chair Rugby
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Type Kit -->
<script type="text/javascript" src="//use.typekit.net/wtk8eul.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>




<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="mobile-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'my-menu') ); ?>
</div>
<div id="page-content">
<header>

	<div class="row">
	
		<div id="branding">
	  		<a href="<?php echo home_url(); ?>"> 
	  			<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
	  		</a>
	  	</div> 

		<nav id="main-navigation" class="show-for-large-up" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'inline-list') ); ?>
		</nav>

	</div>

	<nav id="mobile-navigation" class="hide-for-large-up">
			<a href="#" id="open-left"><img src="<?php echo get_template_directory_uri(); ?>/img/menu-icon.png"></a>
		</nav>

</header>




