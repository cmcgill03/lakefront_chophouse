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

<?php
$options = get_option( 'cd_options_settings' );
echo $options['cd_text_field'] . '<br />';
if (isset($options['cd_checkbox_field']) == 'on'){
echo $options['cd_checkbox_field'] . '<br />';
} else {
echo 'off <br />';
}
echo $options['cd_radio_field'] . '<br />';
echo $options['cd_textarea_field'] . '<br />';
echo $options['cd_select_field'];

?>
<script type="text/javascript">
	jQuery(document).ready(function($) { $.backstretch("<?php echo get_template_directory_uri(); ?>/img/theimage.jpg");
});
</script>

</body>
</html>
