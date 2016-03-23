<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lakefront_chophouse
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<?php $options=get_option( 'lakefront_options_settings' );?>
<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>

<!--
*  Enqueue options page in header 
-->


<style>
.site-title {
	color: <?php echo $options['lakefront_radio_titlecolor']; ?>
}

.entry-content {
	color: <?php echo $options['lakefront_radio_bodycolor']; ?>
}
</style>

<!--
*  fetching lakefront_radio_titlecolor and lakefront_radio_bodycolor from the options file
-->

<script type="text/javascript">// <![CDATA[
jQuery(document).ready(function(){
  jQuery('#slidebx').bxSlider({
    mode: 'horizontal',
    infiniteLoop: true,
    speed: 2000,
    pause: 8000,
    auto: true,
    pager: false,
    controls: true
  });
});
// ]]></script>

</head>

<!-- 
 * Set parameters for the slide via jquery, javascript
 -->

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lakefront_chophouse' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
		
		<div class="site-branding">
			
<!--
*  button at the bottom of the page directing you to the next page
-->

			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $options['lakefront_text_title'];?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $options['lakefront_text_title'];?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle fa fa-bars" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'lakefront_chophouse' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<ul id="slidebx">
		<li>  <img src="wp-content\themes\lakefront_chophouse\images\slider2.jpg" /> <div class="caption1"> 
			<span>Image 1</span>
			 </li>
		<li>  <img src="http://phoenix.sheridanc.on.ca/~ccit3441/wp-content/uploads/2016/03/slider1.jpg" /><div class="caption1"><span>Image 1</span></li>
		<li>  <img src="http://phoenix.sheridanc.on.ca/~ccit3441/wp-content/uploads/2016/03/slider2.jpg" /><div class="caption1"><span>Image 2</span></li>
		<li>  <img src="http://phoenix.sheridanc.on.ca/~ccit3441/wp-content/uploads/2016/03/slider3.jpg" /><div class="caption1"><span>Image 3</span></li>
	</ul>
	
	<div id="content" class="site-content">