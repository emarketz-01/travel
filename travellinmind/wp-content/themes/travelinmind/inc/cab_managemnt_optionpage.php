<?php 
/* Manage  Cabs Settings Page */
class managecabs_Settings_Page {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wph_create_settings' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_fields' ) );
	}
	public function wph_create_settings() {
		$page_title = 'Cab Managents';
		$menu_title = 'Manage  Cabs';
		$capability = 'manage_options';
		$slug = 'managecabs';
		$callback = array($this, 'wph_settings_content');
		$icon = 'dashicons-admin-settings';
		$position = 59;
		add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
	}
	public function wph_settings_content() { ?>
		<div class="wrap">
			<h1>Cab Managents</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
					settings_fields( 'managecabs' );
					do_settings_sections( 'managecabs' );
					submit_button();
				?>
			</form>
		</div> <?php
	}
	public function wph_setup_sections() {
		add_settings_section( 'managecabs_section', 'Cab title and Price Managements', array(), 'managecabs' );
	}
	public function wph_setup_fields() {
		$fields = array(
			array(
				'label' => '1 Cab  Title',
				'id' => 'cab_title_1',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 1 Cab Titles',
			),
			array(
				'label' => '1 Cab Price',
				'id' => 'cab_price_1',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 1 Cab Prices here',
			),
			array(
				'label' => '2 Cab  Title',
				'id' => 'cab_title_2',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 2 Cab Titles',
			),
			array(
				'label' => '2 Cab Price',
				'id' => 'cab_price_2',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 2 Cab Prices here',
			),
			array(
				'label' => '3 Cab  Title',
				'id' => 'cab_title_3',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 3 Cab Titles',
			),
			array(
				'label' => '3 Cab Price',
				'id' => 'cab_price_3',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 3 Cab Prices here',
			),
			array(
				'label' => '4 Cab  Title',
				'id' => 'cab_title_4',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 4 Cab Titles',
			),
			array(
				'label' => '4 Cab Price',
				'id' => 'cab_price_4',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 4 Cab Prices here',
			),
			array(
				'label' => '5 Cab  Title',
				'id' => 'cab_title_5',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 5 Cab Titles',
			),
			array(
				'label' => '5 Cab Price',
				'id' => 'cab_price_5',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 5 Cab Prices here',
			),
			array(
				'label' => '6 Cab  Title',
				'id' => 'cab_title_6',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 6 Cab Titles',
			),
			array(
				'label' => '6 Cab Price',
				'id' => 'cab_price_6',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 6 Cab Prices here',
			),
			array(
				'label' => '7 Cab  Title',
				'id' => 'cab_title_7',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 7 Cab Titles',
			),
			array(
				'label' => '7 Cab Price',
				'id' => 'cab_price_7',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 7 Cab Prices here',
			),
			array(
				'label' => '8 Cab  Title',
				'id' => 'cab_title_8',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 8 Cab Titles',
			),
			array(
				'label' => '8 Cab Price',
				'id' => 'cab_price_8',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 8 Cab Prices here',
			),
			array(
				'label' => '9 Cab  Title',
				'id' => 'cab_title_9',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 9 Cab Titles',
			),
			array(
				'label' => '9 Cab Price',
				'id' => 'cab_price_9',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 9 Cab Prices here',
			),
			array(
				'label' => '10 Cab  Title',
				'id' => 'cab_title_10',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 10 Cab Titles',
			),
			array(
				'label' => '10 Cab Price',
				'id' => 'cab_price_10',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 10 Cab Prices here',
			),
			array(
				'label' => '11 Cab  Title',
				'id' => 'cab_title_11',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 11 Cab Titles',
			),
			array(
				'label' => '11 Cab Price',
				'id' => 'cab_price_11',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 11 Cab Prices here',
			),
			array(
				'label' => '12 Cab Title',
				'id' => 'cab_title_12',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 12 Cab Titles',
			),
			array(
				'label' => '12 Cab Price',
				'id' => 'cab_price_12',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 12 Cab Prices here',
			),
			array(
				'label' => '13 Cab Title',
				'id' => 'cab_title_13',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 13 Cab Titles',
			),
			array(
				'label' => '13 Cab Price',
				'id' => 'cab_price_13',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 13 Cab Prices here',
			),
			array(
				'label' => '14 Cab Title',
				'id' => 'cab_title_14',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 14 Cab Titles',
			),
			array(
				'label' => '14 Cab Price',
				'id' => 'cab_price_14',
				'type' => 'text',
				'section' => 'managecabs_section',
				'desc' => 'Enter 14 Cab Prices here',
			),
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'wph_field_callback' ), 'managecabs', $field['section'], $field );
			register_setting( 'managecabs', $field['id'] );
		}
	}
	public function wph_field_callback( $field ) {
		$value = get_option( $field['id'] );
		switch ( $field['type'] ) {
			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$field['placeholder'],
					$value
				);
		}
		if( $desc = $field['desc'] ) {
			printf( '<p class="description">%s </p>', $desc );
		}
	}
}
new managecabs_Settings_Page(); 


/*------ Tempo Option page------*/

/* Manage  Tempo Settings Page */
class managetempo_Settings_Page {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wph_create_settings' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_fields' ) );
	}
	public function wph_create_settings() {
		$page_title = 'Tempo Managents';
		$menu_title = 'Manage  Tempo';
		$capability = 'manage_options';
		$slug = 'managetempo';
		$callback = array($this, 'wph_settings_content');
		$icon = 'dashicons-admin-settings';
		$position = 59;
		add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
	}
	public function wph_settings_content() { ?>
		<div class="wrap">
			<h1>Tempo Managents</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
					settings_fields( 'managetempo' );
					do_settings_sections( 'managetempo' );
					submit_button();
				?>
			</form>
		</div> <?php
	}
	public function wph_setup_sections() {
		add_settings_section( 'managetempo_section', 'Tempo title and Price Managements', array(), 'managetempo' );
	}
	public function wph_setup_fields() {
		$fields = array(
			array(
				'label' => '1 Tempo  Title',
				'id' => 'tempo_title_1',
				'type' => 'text',
				'section' => 'managetempo_section',
				'desc' => 'Enter 1 Tempo Titles',
			),
			array(
				'label' => '1 Cab Price',
				'id' => 'tempo_price_1',
				'type' => 'number',
				'section' => 'managetempo_section',
				'desc' => 'Enter 1 Tempo Prices here',
			),
			array(
				'label' => '2 Tempo  Title',
				'id' => 'tempo_title_2',
				'type' => 'text',
				'section' => 'managetempo_section',
				'desc' => 'Enter 2 Tempo Titles',
			),
			array(
				'label' => '2 Cab Price',
				'id' => 'tempo_price_2',
				'type' => 'number',
				'section' => 'managetempo_section',
				'desc' => 'Enter 2 Tempo Prices here',
			),
			array(
				'label' => '3 Tempo  Title',
				'id' => 'tempo_title_3',
				'type' => 'text',
				'section' => 'managetempo_section',
				'desc' => 'Enter 3 Tempo Titles',
			),
			array(
				'label' => '3 Cab Price',
				'id' => 'tempo_price_3',
				'type' => 'number',
				'section' => 'managetempo_section',
				'desc' => 'Enter 3 Tempo Prices here',
			),
			array(
				'label' => '4 Tempo  Title',
				'id' => 'tempo_title_4',
				'type' => 'text',
				'section' => 'managetempo_section',
				'desc' => 'Enter 4 Tempo Titles',
			),
			array(
				'label' => '4 Cab Price',
				'id' => 'tempo_price_4',
				'type' => 'number',
				'section' => 'managetempo_section',
				'desc' => 'Enter 4 Tempo Prices here',
			),
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'wph_field_callback' ), 'managetempo', $field['section'], $field );
			register_setting( 'managetempo', $field['id'] );
		}
	}
	public function wph_field_callback( $field ) {
		$value = get_option( $field['id'] );
		switch ( $field['type'] ) {
			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$field['placeholder'],
					$value
				);
		}
		if( $desc = $field['desc'] ) {
			printf( '<p class="description">%s </p>', $desc );
		}
	}
}
new managetempo_Settings_Page();

/* Manage  Coaches Settings Page */
class managecoaches_Settings_Page {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wph_create_settings' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_fields' ) );
	}
	public function wph_create_settings() {
		$page_title = 'Coaches Managements';
		$menu_title = 'Manage  Coaches';
		$capability = 'manage_options';
		$slug = 'managecoaches';
		$callback = array($this, 'wph_settings_content');
		$icon = 'dashicons-admin-settings';
		$position = 59;
		add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
	}
	public function wph_settings_content() { ?>
		<div class="wrap">
			<h1>Coaches Managements</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
					settings_fields( 'managecoaches' );
					do_settings_sections( 'managecoaches' );
					submit_button();
				?>
			</form>
		</div> <?php
	}
	public function wph_setup_sections() {
		add_settings_section( 'managecoaches_section', 'Tempo title and Price Managements', array(), 'managecoaches' );
	}
	public function wph_setup_fields() {
		$fields = array(
			array(
				'label' => '1 Coach  Title',
				'id' => 'coach_title_1',
				'type' => 'text',
				'section' => 'managecoaches_section',
				'desc' => 'Enter Coach Titles',
			),
			array(
				'label' => '1 Coach Price',
				'id' => 'coach_price_1',
				'type' => 'number',
				'section' => 'managecoaches_section',
				'desc' => 'Enter Coach Prices here',
			),
			array(
				'label' => '2 Coach  Title',
				'id' => 'coach_title_2',
				'type' => 'text',
				'section' => 'managecoaches_section',
				'desc' => 'Enter 2 Coach Titles',
			),
			array(
				'label' => '2 Coach Price',
				'id' => 'coach_price_2',
				'type' => 'number',
				'section' => 'managecoaches_section',
				'desc' => 'Enter 2 Coach Prices here',
			),
			array(
				'label' => '3 Coach  Title',
				'id' => 'coach_title_3',
				'type' => 'text',
				'section' => 'managecoaches_section',
				'desc' => 'Enter 3 Coach Titles',
			),
			array(
				'label' => '3 Coach Price',
				'id' => 'coach_price_3',
				'type' => 'number',
				'section' => 'managecoaches_section',
				'desc' => 'Enter 3 Coach Prices here',
			),
			array(
				'label' => '4 Coach  Title',
				'id' => 'coach_title_4',
				'type' => 'text',
				'section' => 'managecoaches_section',
				'desc' => 'Enter 4 Coach Titles',
			),
			array(
				'label' => '4 Coach Price',
				'id' => 'coach_price_4',
				'type' => 'number',
				'section' => 'managecoaches_section',
				'desc' => 'Enter 4 Coach Prices here',
			),
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'wph_field_callback' ), 'managecoaches', $field['section'], $field );
			register_setting( 'managecoaches', $field['id'] );
		}
	}
	public function wph_field_callback( $field ) {
		$value = get_option( $field['id'] );
		switch ( $field['type'] ) {
			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$field['placeholder'],
					$value
				);
		}
		if( $desc = $field['desc'] ) {
			printf( '<p class="description">%s </p>', $desc );
		}
	}
}
new managecoaches_Settings_Page(); ?>