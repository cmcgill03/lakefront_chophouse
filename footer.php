<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lakefront_chophouse
 */

?>

	</div><!-- #content -->
	
<!-- sets the variable options from the array in the options page -->	
<?php $options=get_option( 'lakefront_options_settings' );?>

<!--
* Publishes content into the footer menu
-->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="sm-icons">
		<a href="<?php echo $options['lakefront_text_facebook'];?>" class="fa fa-facebook-square"></a>
		<a href="<?php echo $options['lakefront_text_instagram'];?>" class="fa fa-instagram"></a>
		<a href="<?php echo $options['lakefront_text_twitter'];?>" class="fa fa-twitter-square"></a>
		<a href="<?php echo $options['lakefront_text_yelp'];?>" class="fa fa-yelp"></a>
		</div>
		<div id="footer_menu"><?php wp_nav_menu( array( 'menu' => 'menu-footer', 'lakefront_chophouse' => 'footer' ) ); ?></div>
		<div class="site-info">
<!--
* This function makes the text Proudly published by WordPress appear in hyperlink form
-->

			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lakefront_chophouse' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'lakefront_chophouse' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			
<!--
* This function is looking in the widget id and widget class, it is displaying the theme name as lakefront_chophouse and has a hyperlink to Underscores.me 
-->

			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'lakefront_chophouse' ), 'lakefront_chophouse', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
