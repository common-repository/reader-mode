<?php
/**
 * Installation related functions and actions.
 *
 * @since 2.0.2
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class Install
 */
class Reader_Mode_Install {

	public static function activate() {
		self::create_default_data();
	}


	/**
	 * create default data
	 *
	 * @since 2.0.8
	 */
	private static function create_default_data() {

		$version      = get_option( 'reader_mode_version', '0' );
		$install_time = get_option( 'reader_mode_install_time', '' );

		if ( empty( $version ) ) {
			update_option( 'reader_mode_version', READER_MODE_VERSION );
		}

		if ( ! empty( $install_time ) ) {
			$date_format = get_option( 'date_format' );
			$time_format = get_option( 'time_format' );
			update_option( 'reader_mode_install_time', date( $date_format . ' ' . $time_format ) );
		}


	}


}