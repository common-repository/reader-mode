<?php


defined( 'ABSPATH' ) || exit;


class Reader_Mode_Rest_Api {
	/** @var null */
	private static $instance = null;

	private $namespace = 'reader-mode/v1';


	/**
	 * Rest_Api_Controller constructor.
	 *
	 */
	public function __construct() {
		add_action( 'rest_api_init', [ $this, 'register_api' ] );
	}

	/**
	 * Register rest API
	 *
	 * @since 1.0.0
	 */
	public function register_api() {

		// Get Toggles
		register_rest_route( $this->namespace, '/get-posts/', array(
			array(
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'get_posts' ),
				'permission_callback' => '__return_true',
			),
		) );

		// Save Settings
		register_rest_route( $this->namespace, '/settings/', array(
			array(
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'save_settings' ),
				'permission_callback' => '__return_true',
			),
		) );

		// Get Settings
		register_rest_route( $this->namespace, '/settings/', array(
			array(
				'methods'             => \WP_REST_Server::READABLE,
				'callback'            => array( $this, 'get_settings' ),
				'permission_callback' => '__return_true',
			),
		) );

	}

	public function get_settings( $request ) {
		$settings = get_option( 'reader_mode_settings' );

		return rest_ensure_response( $settings );
	}

	public function save_settings( $request ) {
		$settings = $request->get_json_params();
		update_option( 'reader_mode_settings', $settings );

		return true;
	}

	public function get_posts( $request ) {
		$params = $request->get_json_params();

		$post_types        = ! empty( $params['post_types'] ) ? $params['post_types'] : array();
		$select_all        = ! empty( $params['select_all'] );
		$except_post_types = ! empty( $params['except_post_types'] ) ? $params['except_post_types'] : array();

		$all_types = get_post_types( array( 'public' => true ) );

		if ( $select_all ) {
			if ( ! empty( $except_post_types ) ) {
				$post_types = array_diff( $all_types, $except_post_types );
			} else {
				$post_types = $all_types;
			}
		}

		$list = [];
		foreach ( $post_types as $post_type ) {

			$query = new WP_Query(
				array(
					'post_type'      => $post_type,
					'posts_per_page' => 999,
				)
			);

			if ( $query->have_posts() ) {

				$post_type_options = [];
				while ( $query->have_posts() ) {
					$query->the_post();
					$post_type_options[] = array(
						'value' => get_the_ID(),
						'label' => get_the_title(),
					);
				}

				$list[] = [
					'label'   => ucfirst( $post_type ),
					'options' => $post_type_options,
				];
			}
		}

		return rest_ensure_response( $list );

	}

	/**
	 * @return Reader_Mode_Rest_Api|null
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}


Reader_Mode_Rest_Api::instance();