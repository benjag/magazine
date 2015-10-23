<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package pacificmagazine
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'pacificmagazine' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<!--
<div class="site-branding">
			<div class="title-box">
				
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
			

		</div>
--><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
		<a href="<?php bloginfo('url'); ?>"><img class="site-title" src="<?php bloginfo('template_url') ?>/images/maglogo.png" alt="<?php bloginfo('description'); ?>" title="<?php bloginfo('name'); ?>" /></a>

					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Primary Menu', 'pacificmagazine' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			
			<div class="search-toggle">
				<i class="fa fa-search"></i>
				<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'pacificmagazine' ); ?></a>
			</div>
			
			
			
		</nav><!-- #site-navigation -->
		<div id="search-container" class="search-box-wrapper clear">
			<div class="search-box clear">
				<?php get_search_form(); ?>
			</div>
		</div> 	
</header><!-- #masthead -->

	<div id="content" class="site-content">
