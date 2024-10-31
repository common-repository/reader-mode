<?php

defined( 'ABSPATH' ) || exit;

class Reader_Mode_Admin {

	private static $instance = null;

	public function __construct() {
		add_action( 'admin_head', [ $this, 'remove_admin_notices' ] );
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
	}

	public function remove_admin_notices() {
		global $current_screen;

		if ( ! empty( $current_screen ) && ! in_array( $current_screen->id, [
				'reader-mode_page_reader-mode-getting-started',
				'reader-mode_page_reader-mode-button-builder',
				'toplevel_page_reader-mode',
			] ) ) {
			return;
		}

		remove_all_actions( 'admin_notices' );
		remove_all_actions( 'all_admin_notices' );

		add_filter( 'admin_footer_text', '__return_empty_string' );
		add_filter( 'update_footer', '__return_empty_string' );
	}


	public function add_admin_menu() {
		add_menu_page( 'Reader Mode', 'Reader Mode', 'manage_options', 'reader-mode', array(
			$this,
			'settings_page'
		), READER_MODE_ASSETS . '/images/reader-mode-icon.svg', 50 );

		add_submenu_page( 'reader-mode', __( 'Settings - Reader Mode', 'reader-mode' ), __( 'Settings', 'reader-mode' ), 'manage_options', 'reader-mode' );

		//add_submenu_page( 'reader-mode', 'Button Builder - Reader Mode', 'Button Builder', 'manage_options', 'reader-mode-button-builder', array( 'Reader_Button_Builder', 'view' ) );
		add_submenu_page( 'reader-mode', 'Getting Started - Reader Mode', 'Getting Started', 'manage_options', 'reader-mode-getting-started', array(
			$this,
			'render_getting_started_page'
		) );
	}

	public function render_getting_started_page() {
		include_once READER_MODE_PATH . '/includes/views/getting-started/index.php';
	}

	public function settings_page() { ?>
        <div id="reader-mode-settings"></div>
	<?php }

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

}

Reader_Mode_Admin::instance();