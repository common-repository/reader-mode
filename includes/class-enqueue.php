<?php

defined( 'ABSPATH' ) || exit();

class Reader_Mode_Enqueue {

	private static $instance = null;

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'frontend_scripts' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue' ] );
	}

	/**
	 * Frontend Scripts
	 *
	 * @param $hook
	 */
	public function frontend_scripts( $hook ) {

		/* enqueue frontend styles */
		wp_enqueue_style( 'reader-mode-frontend', READER_MODE_ASSETS . '/css/frontend.css', [
			'dashicons'
		], READER_MODE_VERSION );

		wp_add_inline_style( 'reader-mode-frontend', $this->get_custom_css() );

		/* enqueue frontend script */
		wp_enqueue_script( 'reader-mode-frontend', READER_MODE_ASSETS . '/js/frontend.js', [
			'jquery',
			'wp-element',
			'wp-components',
			'wp-editor',
			'wp-util',
		], READER_MODE_VERSION, true );


		wp_localize_script( 'reader-mode-frontend', 'readerMode', $this->get_localize_data() );

	}

	/**
	 * Admin Scripts
	 *
	 * @param $hook
	 */
	public function admin_enqueue( $hook ) {

		wp_enqueue_style( 'reader-mode-admin', READER_MODE_ASSETS . '/css/admin.css', [ 'wp-components', ], READER_MODE_VERSION );

		$page = ! empty( $_GET['page'] ) ? sanitize_key( $_GET['page'] ) : '';

		if ( 'reader-mode' === $page ) {
			wp_enqueue_media();

			wp_enqueue_style( 'sweetalert', READER_MODE_ASSETS . '/vendor/sweetalert2/sweetalert2.min.css', false, READER_MODE_VERSION );


			wp_enqueue_script( 'text-to-speech-engines-watson', READER_MODE_ASSETS . '/vendor/text-to-speech/engines/watson.js', [ 'jquery' ], READER_MODE_VERSION, true );
			wp_enqueue_script( 'text-to-speech-engines-translate', READER_MODE_ASSETS . '/vendor/text-to-speech/engines/translate.js', [ 'jquery' ], READER_MODE_VERSION, true );

			wp_enqueue_script( 'wp-theme-plugin-editor' );
			wp_enqueue_style( 'wp-codemirror' );

			wp_enqueue_code_editor( array(
				'type' => 'text/css',
			) );

			wp_enqueue_script( 'sweetalert', READER_MODE_ASSETS . '/vendor/sweetalert2/sweetalert2.min.js', [], READER_MODE_VERSION, true );
		}


		wp_enqueue_script( 'reader-mode-admin', READER_MODE_ASSETS . '/js/admin.js', [
			'jquery',
			'wp-util',
			'wp-element',
			'wp-components',
			'wp-editor',
		], READER_MODE_VERSION, true );

		wp_localize_script( 'reader-mode-admin', 'readerMode', $this->get_localize_data() );

	}

	public function get_localize_data() {
		$data = [
			'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
			'pluginUrl' => READER_MODE_URL,
			'siteUrl'   => site_url(),
			'settings'  => get_option( 'reader_mode_settings', [] ),
			'isPro'     => rm_fs()->can_use_premium_code__premium_only(),
		];

		$page = ! empty( $_GET['page'] ) ? sanitize_key( $_GET['page'] ) : '';

		if ( $page == 'reader-mode' ) {
			$data['postTypes'] = reader_mode_get_post_type_list();
		}

		if ( is_admin() ) {
			$data['upgradeUrl'] = rm_fs()->get_upgrade_url();
		}

		return $data;
	}

	public function get_custom_css() {
		$css = '';

		// General Button
		$buttonAlignment = reader_mode_get_settings( 'buttonAlignment', 'start' );
		$button_variable = sprintf( '--reader-mode-button-alignment: %s;', $buttonAlignment );
		$css             .= sprintf( '.reader-mode-buttons { %s }', $button_variable );

		// Reader Mode CSS Variable
		$readerModeBGColor   = reader_mode_get_settings( 'readerModeBGColor', '#E3F5FF' );
		$readerModeBGDarker  = reader_mode_color_brightness( $readerModeBGColor, - 30 );
		$readerModeTextColor = reader_mode_get_settings( 'readerModeTextColor', '#2F80ED' );

		$reader_mode_variable = '';
		$reader_mode_variable .= ! empty( $readerModeBGColor ) ? sprintf( '--reader-mode-bg-color: %s;', $readerModeBGColor ) : '';
		$reader_mode_variable .= ! empty( $readerModeBGColor ) ? sprintf( '--reader-mode-bg-darker: %s;', $readerModeBGDarker ) : '';
		$reader_mode_variable .= ! empty( $readerModeTextColor ) ? sprintf( '--reader-mode-text-color: %s;', $readerModeTextColor ) : '';

		$css .= sprintf( '.reader-mode-buttons .reader-mode-button { %s }', $reader_mode_variable );

		// TTS CSS Variable
		$TTSBGColor   = reader_mode_get_settings( 'TTSBGColor', '' );
		$TTSBGDarker  = reader_mode_color_brightness( $TTSBGColor, - 30 );
		$TTSTextColor = reader_mode_get_settings( 'TTSTextColor', '' );

		$tts_variable = '';
		$tts_variable .= ! empty( $TTSBGColor ) ? sprintf( '--tts-bg-color: %s;', $TTSBGColor ) : '';
		$tts_variable .= ! empty( $TTSBGColor ) ? sprintf( '--tts-bg-darker: %s;', $TTSBGDarker ) : '';
		$tts_variable .= ! empty( $TTSTextColor ) ? sprintf( '--tts-text-color: %s;', $TTSTextColor ) : '';

		$css .= sprintf( '.reader-mode-buttons .reader-mode-tts { %s }', $tts_variable );

		// Time CSS Variable
		$timeBGColor   = reader_mode_get_settings( 'timeBGColor' );
		$timeBGDarker  = reader_mode_color_brightness( $timeBGColor, - 30 );
		$timeTextColor = reader_mode_get_settings( 'timeTextColor' );

		$time_variable = '';
		$time_variable .= ! empty( $timeBGColor ) ? sprintf( '--time-bg-color: %s;', $timeBGColor ) : '';
		$time_variable .= ! empty( $timeBGColor ) ? sprintf( '--time-bg-darker: %s;', $timeBGDarker ) : '';
		$time_variable .= ! empty( $timeTextColor ) ? sprintf( '--time-text-color: %s;', $timeTextColor ) : '';

		$css .= sprintf( '.reader-mode-buttons .reader-mode-time { %s }', $time_variable );

		// Translation CSS Variable
		$translationBGColor   = reader_mode_get_settings( 'translationBGColor' );
		$translationBGDarker  = reader_mode_color_brightness( $translationBGColor, - 30 );
		$translationTextColor = reader_mode_get_settings( 'translationTextColor' );

		$translationIcon       = reader_mode_get_settings( 'translationIcon', 1 );
		$customTranslationIcon = reader_mode_get_settings( 'customTranslationIcon', '' );


		$translation_variable = '';
		$translation_variable .= ! empty( $translationBGColor ) ? sprintf( '--translation-bg-color: %s;', $translationBGColor ) : '';
		$translation_variable .= ! empty( $translationBGColor ) ? sprintf( '--translation-bg-darker: %s;', $translationBGDarker ) : '';
		$translation_variable .= ! empty( $translationTextColor ) ? sprintf( '--translation-text-color: %s;', $translationTextColor ) : '';

		if ( ! empty( $customTranslationIcon ) ) {
			$translation_variable .= sprintf( '--translation-icon-image: url(%s)', $customTranslationIcon );
		} else {
			$translation_variable .= sprintf( '--translation-icon: url(../images/icons/translation/%s.svg) no-repeat center / contain', $translationIcon );
		}

		$css .= sprintf( '.reader-mode-buttons .reader-mode-translation { %s }', $translation_variable );

		// Progressbar CSS Variable
		$progressbar_height = reader_mode_get_settings( 'progressbarHeight', '7' );
		$progressbar_color  = reader_mode_get_settings( 'progressbarColor', '#7C7EE5' );

		$progressbar_variable = '';
		$progressbar_variable .= sprintf( '--reader-mode-progress-height: %spx;', $progressbar_height );
		$progressbar_variable .= sprintf( '--reader-mode-progress-color: %s;', $progressbar_color );

		$css .= sprintf( '.reader-mode-progress { %s }', $progressbar_variable );

		// General Mode custom CSS
		$custom_css = reader_mode_get_settings( 'generalCustomCSS', '' );
		$css        .= $custom_css;

		return $css;
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Reader_Mode_Enqueue::instance();




