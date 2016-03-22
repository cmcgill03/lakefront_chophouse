<?php

function lakefront_add_submenu() {
	add_submenu_page( 'themes.php', 'Lakefront Chophouse Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
}

/**
 * This function takes a capability which will be used to determine whether or not a page is included in the menu
 */

add_action( 'admin_menu', 'lakefront_add_submenu' );

/**
 * Hooks a function on to a specific action, in this case submenu
 */


function lakefront_settings_init() {
	
	register_setting( 'theme_options', 'lakefront_options_settings' );
	
/**
 * Allows registration of theme options in settings 
 */
	
	add_settings_section(
		'lakefront_options_page_section', //  the id
		'Options Page', // Section Title
		'lakefront_options_page_section_callback', //$callback (function we will create)
		'theme_options'// page (matches menu_slug set in add_submenu_page)
		);
	
	function lakefront_options_page_section_callback() { 
		echo 'Welcome to the options page! Here you can:'?></br><?php
		echo '1. Change the title,' ?></br><?php
		echo '2. Change the colour of the title,' ?></br><?php
		echo '3. Change the main text colour,' ?></br><?php
		echo '4. Direct the social media links to your pages.'?></br><?php ;
	}// the function created in add_settings_section
	
	/*Title text */
	
	add_settings_field( 
		'lakefront_text_title', // id
		'Enter the title of the page:', // title
		'lakefront_text_field_title', // $callback (function we will create)
		'theme_options', // page (matches menu_slug)
		'lakefront_options_page_section'// section (matches section in add_settings_section)
	);
		
	function lakefront_text_field_title() {
		$options = get_option( 'lakefront_options_settings' );
		?>
		<input type="text" name="lakefront_options_settings[lakefront_text_title]" value="<?php if (isset($options['lakefront_text_title'])) {
		echo $options['lakefront_text_title']; }?>" />
		<?php
	}
	
	/* add_settings_field(
		'lakefront_checkbox_field',
		'Check your preference',
		'lakefront_checkbox_field_render',
		'theme_options',
		'lakefront_options_page_section'
	);
	
	function lakefront_checkbox_field_render() {
		$options = get_option( 'lakefront_options_settings' );
		?>
		<input type="checkbox" name="lakefront_options_settings[lakefront_checkbox_field]" 
		<?php 
		if (isset($options['lakefront_checkbox_field']))checked( 'on', ($options['lakefront_checkbox_field']) ) ; ?> value="on" />
		<label>Turn it On</label>
		<?php
	} */
	
	/*Title color*/
	
	add_settings_field(
		'lakefront_radio_titlecolor',
		'Please choose a color for the title:',
		'lakefront_radio_title_color',
		'theme_options',
		'lakefront_options_page_section'
	);
	
	function lakefront_radio_title_color() {
		$options = get_option( 'lakefront_options_settings' );
		?>
		<input type="radio" name="lakefront_options_settings[lakefront_radio_titlecolor]" <?php if (isset($options
		['lakefront_radio_titlecolor'])) checked( $options['lakefront_radio_titlecolor'], 1 ); ?> value="white" /> <label>White</label><br
		/>
		<input type="radio" name="lakefront_options_settings[lakefront_radio_titlecolor]" <?php if (isset($options
		['lakefront_radio_titlecolor'])) checked( $options['lakefront_radio_titlecolor'], 2 ); ?> value="blue" /> <label>Blue</label><br
		/>
		<input type="radio" name="lakefront_options_settings[lakefront_radio_titlecolor]" <?php if (isset($options
		['lakefront_radio_titlecolor'])) checked( $options['lakefront_radio_titlecolor'], 3 ); ?> value="black" /> <label>Black</label>
		<?php
	}
	
	/*Body text color*/
	
	add_settings_field(
		'lakefront_radio_bodycolor',
		'Please choose a color for the body text:',
		'lakefront_radio_body_color',
		'theme_options',
		'lakefront_options_page_section'
	);
	
	function lakefront_radio_body_color() {
		$options = get_option( 'lakefront_options_settings' );
		?>
		<input type="radio" name="lakefront_options_settings[lakefront_radio_bodycolor]" <?php if (isset($options
		['lakefront_radio_bodycolor'])) checked( $options['lakefront_radio_bodycolor'], 1 ); ?> value="black" /> <label>Black</label><br
		/>
		<input type="radio" name="lakefront_options_settings[lakefront_radio_bodycolor]" <?php if (isset($options
		['lakefront_radio_bodycolor'])) checked( $options['lakefront_radio_bodycolor'], 2 ); ?> value="white" /> <label>White</label><br
		/>
		<input type="radio" name="lakefront_options_settings[lakefront_radio_bodycolor]" <?php if (isset($options
		['lakefront_radio_bodycolor'])) checked( $options['lakefront_radio_bodycolor'], 3 ); ?> value="red" /> <label>Red</label>
		<?php
	}
	
	/*Facebook Link*/
	
	add_settings_field( 
		'lakefront_text_facebook', // id
		'Enter the link for the Facebook icon:', // title
		'lakefront_text_field_facebook', // $callback (function we will create)
		'theme_options', // page (matches menu_slug)
		'lakefront_options_page_section'// section (matches section in add_settings_section)
	);
		
	function lakefront_text_field_facebook() {
		$options = get_option( 'lakefront_options_settings' );
		?>
		<input type="text" name="lakefront_options_settings[lakefront_text_facebook]" value="<?php if (isset($options['lakefront_text_facebook'])) {
		echo $options['lakefront_text_facebook']; }?>" />
		<?php
	}
	
	/*Instagram Link*/
	
	add_settings_field( 
		'lakefront_text_instagram', // id
		'Enter the link for the Instagram icon:', // title
		'lakefront_text_field_instagram', // $callback (function we will create)
		'theme_options', // page (matches menu_slug)
		'lakefront_options_page_section'// section (matches section in add_settings_section)
	);
		
	function lakefront_text_field_instagram() {
		$options = get_option( 'lakefront_options_settings' );
		?>
		<input type="text" name="lakefront_options_settings[lakefront_text_instagram]" value="<?php if (isset($options['lakefront_text_instagram'])) {
		echo $options['lakefront_text_instagram']; }?>" />
		<?php
	}
	
	/*Twitter Link*/
	
	add_settings_field( 
		'lakefront_text_twitter', // id
		'Enter the link for the Twitter icon:', // title
		'lakefront_text_field_twitter', // $callback (function we will create)
		'theme_options', // page (matches menu_slug)
		'lakefront_options_page_section'// section (matches section in add_settings_section)
	);
		
	function lakefront_text_field_twitter() {
		$options = get_option( 'lakefront_options_settings' );
		?>
		<input type="text" name="lakefront_options_settings[lakefront_text_twitter]" value="<?php if (isset($options['lakefront_text_twitter'])) {
		echo $options['lakefront_text_twitter']; }?>" />
		<?php
	}
	
	/*Yelp Link*/
	
	add_settings_field( 
		'lakefront_text_yelp', // id
		'Enter the link for the Yelp icon:', // title
		'lakefront_text_field_yelp', // $callback (function we will create)
		'theme_options', // page (matches menu_slug)
		'lakefront_options_page_section'// section (matches section in add_settings_section)
	);
		
	function lakefront_text_field_yelp() {
		$options = get_option( 'lakefront_options_settings' );
		?>
		<input type="text" name="lakefront_options_settings[lakefront_text_yelp]" value="<?php if (isset($options['lakefront_text_yelp'])) {
		echo $options['lakefront_text_yelp']; }?>" />
		<?php
	}
	
	function my_theme_options_page(){
		?>
		<form action="options.php" method="post">
			<h2>LAKEFRONT CHOPHOUSE</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}
}

add_action( 'admin_init', 'lakefront_settings_init' );

?>
