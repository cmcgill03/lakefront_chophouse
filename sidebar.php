<?php
/**
 * The sidebar containing the main widget area.
 * test change
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lakefront_chophouse
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!--
* This Conditional Tag checks if a given sidebar is active, either true or false
-->

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
