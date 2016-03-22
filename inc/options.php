<?php

function lakefront_add_submenu() {
	add_submenu_page( 'themes.php', 'Lakefront Chophouse Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
}

add_action( 'admin_menu', 'lakefront_add_submenu' );

function lakefront_settings_init() {
	
	register_setting( 'theme_options', 'lakefront_options_settings' );
	
	add_settings_section(
		'lakefront_options_page_section', //  the id
		'Options Page', // Section Title
		'lakefront_options_page_section_callback', //$callback (function we will create)
		'theme_options'// page (matches menu_slug set in add_submenu_page)
		);
	
	function lakefront_options_page_section_callback() { 
		echo 'Welcome to the options page! Here you can...' ;
	}// the function created in add_settings_section
	
	add_settings_field( 
		'lakefront_text_field', // id
		'Enter your text', // title
		'lakefront_text_field_render', // $callback (function we will create)
		'theme_options', // page (matches menu_slug)
		'lakefront_options_page_section'// section (matches section in add_settings_section)
	);
		
	function lakefront_text_field_render() { 
		$options=get_option( 'lakefront_options_settings' );
		?>
		<input type="text" name="lakefront_options_settings[lakefront_text_field]" value=" 
		<?php
		if (isset($options['lakefront_text_field'])) echo $options['lakefront_text_field']; ?>"
		/>
		<?php
	}
	
	add_settings_field(
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
	}
	
	add_settings_field(
		'lakefront_radio_field',
		'Choose an option',
		'lakefront_radio_field_render',
		'theme_options',
		'lakefront_options_page_section'
	);
	
	function lakefront_radio_field_render() {
		$options = get_option( 'lakefront_options_settings' );
		?>
		<input type="radio" name="lakefront_options_settings[lakefront_radio_field]" <?php if (isset($options
		['lakefront_radio_field'])) checked( $options['lakefront_radio_field'], black ); ?> value="black" /> <label>Black</label><br
		/>
		<input type="radio" name="lakefront_options_settings[lakefront_radio_field]" <?php if (isset($options
		['lakefront_radio_field'])) checked( $options['lakefront_radio_field'], blue ); ?> value="blue" /> <label>Blue</label><br
		/>
		<input type="radio" name="lakefront_options_settings[lakefront_radio_field]" <?php if (isset($options
		['lakefront_radio_field'])) checked( $options['lakefront_radio_field'], white ); ?> value="white" /> <label>White</label>
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