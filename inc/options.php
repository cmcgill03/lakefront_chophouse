<?php

function cd_add_submenu() {
	add_submenu_page( 'themes.php', 'My Super Awesome Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
}

add_action( 'admin_menu', 'cd_add_submenu' );

function cd_settings_init() {
	
	register_setting( 'theme_options', 'cd_options_settings' );
	
	add_settings_section(
		'cd_options_page_section', //  the id
		'Your section title', // Section Title
		'cd_options_page_section_callback', //$callback (function we will create)
		'theme_options'// page (matches menu_slug set in add_submenu_page)
		);
	
	function cd_options_page_section_callback() { 
		echo 'A description and detail about the section.' ;
	}// the function created in add_settings_section
	
	add_settings_field( 
		'cd_text_field', // id
		'Enter your text', // title
		'cd_text_field_render', // $callback (function we will create)
		'theme_options', // page (matches menu_slug)
		'cd_options_page_section'// section (matches section in add_settings_section)
	);
		
	function cd_text_field_render() { 
		$options=get_option( 'cd_options_settings' );
		?>
		<input type="text" name="cd_options_settings[cd_text_field]" value=" 
		<?php
		if (isset($options['cd_text_field'])) echo $options['cd_text_field']; ?>"
		/>
		<?php
	}
	
	add_settings_field(
		'cd_checkbox_field',
		'Check your preference',
		'cd_checkbox_field_render',
		'theme_options',
		'cd_options_page_section'
	);
	
	function cd_checkbox_field_render() {
		$options = get_option( 'cd_options_settings' );
		?>
		<input type="checkbox" name="cd_options_settings[cd_checkbox_field]" 
		<?php 
		if (isset($options['cd_checkbox_field']))checked( 'on', ($options['cd_checkbox_field']) ) ; ?> value="on" />
		<label>Turn it On</label>
		<?php
	}
	
	add_settings_field(
		'cd_radio_field',
		'Choose an option',
		'cd_radio_field_render',
		'theme_options',
		'cd_options_page_section'
	);
	
	function cd_radio_field_render() {
		$options = get_option( 'cd_options_settings' );
		?>
		<input type="radio" name="cd_options_settings[cd_radio_field]" <?php if (isset($options
		['cd_radio_field'])) checked( $options['cd_radio_field'], 1 ); ?> value="1" /> <label>Option One</label><br
		/>
		<input type="radio" name="cd_options_settings[cd_radio_field]" <?php if (isset($options
		['cd_radio_field'])) checked( $options['cd_radio_field'], 2 ); ?> value="2" /> <label>Option Two</label><br
		/>
		<input type="radio" name="cd_options_settings[cd_radio_field]" <?php if (isset($options
		['cd_radio_field'])) checked( $options['cd_radio_field'], 3 ); ?> value="3" /> <label>Option Three</label>
		<?php
	}
	
	function my_theme_options_page(){
		?>
		<form action="options.php" method="post">
			<h2>My Awesome Options Page</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}
}

add_action( 'admin_init', 'cd_settings_init' );

?>