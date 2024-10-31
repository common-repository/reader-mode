<?php

/**
 * Plugin Name:  Reader Mode
 * Plugin URI:  https://softlabbd.com/reader-mode/
 * Description: Distraction-free content reader with Reader Mode Layout, Text-to-Speech, Translation, Reading Time, and Reading Progress Bar.
 * Version:     1.0.0
 * Author:      SoftLab
 * Author URI:  https://softlabbd.com/
 * Text Domain: reader-mode
 * Domain Path: /languages/*
 *
 */
// don't call the file directly
if ( !defined( 'ABSPATH' ) ) {
    wp_die( __( 'You can\'t access this page', 'reader-mode' ) );
}

if ( function_exists( 'rm_fs' ) ) {
    rm_fs()->set_basename( false, __FILE__ );
} else {
    // DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE `function_exists` CALL ABOVE TO PROPERLY WORK.
    
    if ( !function_exists( 'rm_fs' ) ) {
        // Create a helper function for easy SDK access.
        function rm_fs()
        {
            global  $rm_fs ;
            
            if ( !isset( $rm_fs ) ) {
                // Activate multisite network integration.
                if ( !defined( 'WP_FS__PRODUCT_11298_MULTISITE' ) ) {
                    define( 'WP_FS__PRODUCT_11298_MULTISITE', true );
                }
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $rm_fs = fs_dynamic_init( array(
                    'id'             => '11298',
                    'slug'           => 'reader-mode',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_80967cef60b446d3ea06c0210771f',
                    'is_premium'     => false,
                    'premium_suffix' => 'PRO',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'trial'          => array(
                    'days'               => 3,
                    'is_require_payment' => true,
                ),
                    'menu'           => array(
                    'slug'       => 'reader-mode',
                    'first-path' => 'admin.php?page=reader-mode-getting-started',
                    'contact'    => false,
                    'support'    => false,
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $rm_fs;
        }
        
        // Init Freemius.
        rm_fs();
        // Signal that SDK was initiated.
        do_action( 'rm_fs_loaded' );
    }
    
    /** define constants */
    define( 'READER_MODE_VERSION', '1.0.0' );
    define( 'READER_MODE_FILE', __FILE__ );
    define( 'READER_MODE_PATH', dirname( READER_MODE_FILE ) );
    define( 'READER_MODE_INCLUDES', READER_MODE_PATH . '/includes' );
    define( 'READER_MODE_URL', plugins_url( '', READER_MODE_FILE ) );
    define( 'READER_MODE_ASSETS', READER_MODE_URL . '/assets' );
    define( 'READER_MODE_TEMPLATES', READER_MODE_PATH . '/templates' );
    //Include the base plugin file.
    include_once READER_MODE_INCLUDES . '/class-base.php';
}
