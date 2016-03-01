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

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div id="footer_menu"><?php wp_nav_menu( array( 'menu' => 'menu-footer', 'laekfront_chophouse' => 'footer' ) ); ?></div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lakefront_chophouse' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'lakefront_chophouse' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'lakefront_chophouse' ), 'lakefront_chophouse', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
