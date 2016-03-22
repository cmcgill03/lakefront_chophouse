<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lakefront_chophouse
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'lakefront_chophouse' ); ?></h1>
	</header><!-- .page-header for no results found -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'lakefront_chophouse' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<!--
* Allows the user to publish posts given the fact that conditions are met
-->
		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lakefront_chophouse' ); ?></p>
			<?php
				get_search_form();

		else : ?>
		
<!--
* Response when a search query is not met
-->

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lakefront_chophouse' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
		
<!--
* Response when a search query is not met
-->

	</div><!-- .page-content -->
</section><!-- .no-results -->
