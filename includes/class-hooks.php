<?php

defined( 'ABSPATH' ) || exit;
class Reader_Mode_Hooks
{
    /** @var null */
    private static  $instance = null ;
    /**
     * Reader_Mode_Hooks constructor.
     */
    public function __construct()
    {
        add_action( 'template_redirect', [ $this, 'reader_mode' ] );
        add_action( 'wp', [ $this, 'add_positions' ] );
    }
    
    public function add_positions()
    {
        $post_id = get_the_ID();
        if ( !reader_mode_should_render( $post_id ) ) {
            return false;
        }
        add_filter(
            'the_title',
            array( $this, 'title_content' ),
            10,
            2
        );
        
        if ( is_singular() ) {
            add_filter( 'the_content', [ $this, 'content_single' ] );
        } else {
            if ( is_home() || is_archive() ) {
                add_filter( 'get_the_excerpt', array( $this, 'content_archive' ) );
            }
        }
        
        add_filter( 'comments_template', array( $this, 'remove_comments_title_content' ) );
        $enable_reading_progress = reader_mode_get_settings( 'enableReadingProgress', true );
        if ( $enable_reading_progress && is_singular() ) {
            add_action( 'wp_footer', 'reader_mode_render_progressbar', 999 );
        }
    }
    
    public function reader_mode()
    {
        if ( empty($_GET['reader-mode']) ) {
            return;
        }
        include_once READER_MODE_TEMPLATES . '/reader-mode.php';
        exit;
    }
    
    public function remove_comments_title_content()
    {
        remove_filter( 'the_title', array( $this, 'title_content' ) );
    }
    
    public function title_content( $title, $id )
    {
        
        if ( in_the_loop() ) {
            
            if ( is_singular() ) {
                $current_object = get_queried_object();
                $post_id = $current_object->ID;
            } else {
                $post_id = get_the_ID();
            }
            
            // If not the same post, return.
            if ( $id != $post_id ) {
                return $title;
            }
            $title_prefix = '';
            $title_suffix = '';
            // Reading Time
            
            if ( reader_mode_should_show_time() ) {
                $time_position = reader_mode_get_settings( 'timePosition', 'aboveTitle' );
                
                if ( $time_position == 'aboveTitle' ) {
                    $title_prefix .= reader_mode_get_time_html( $post_id );
                } elseif ( $time_position == 'belowTitle' ) {
                    $title_suffix .= reader_mode_get_time_html( $post_id );
                }
            
            }
            
            $button_position = reader_mode_get_settings( 'buttonPosition', 'aboveContent' );
            // Reader Mode Button
            if ( reader_mode_should_show_button() ) {
                
                if ( $button_position == 'aboveTitle' ) {
                    $title_prefix .= reader_mode_get_button_html( $post_id );
                } elseif ( $button_position == 'belowTitle' ) {
                    $title_suffix .= reader_mode_get_button_html( $post_id );
                }
            
            }
            return '<span class="reader-mode-buttons">' . $title_prefix . '</span>' . $title . '<span class="reader-mode-buttons">' . $title_suffix . '</span>';
        }
        
        return $title;
    }
    
    public function content_single( $content )
    {
        
        if ( in_the_loop() ) {
            $post_id = get_the_ID();
            $content_prefix = '';
            // Reading Time
            
            if ( reader_mode_should_show_time() ) {
                $time_position = reader_mode_get_settings( 'timePosition', 'aboveTitle' );
                if ( $time_position === 'aboveContent' ) {
                    $content_prefix .= reader_mode_get_time_html( $post_id );
                }
            }
            
            $button_position = reader_mode_get_settings( 'buttonPosition', 'aboveContent' );
            // Reader Mode Button
            if ( reader_mode_should_show_button() ) {
                if ( $button_position === 'aboveContent' ) {
                    $content_prefix .= reader_mode_get_button_html( $post_id );
                }
            }
            return '<span class="reader-mode-buttons">' . $content_prefix . '</span><div class="reader-mode-content">' . $content . '</div>';
        }
        
        return $content;
    }
    
    public function content_archive( $excerpt )
    {
        
        if ( in_the_loop() ) {
            $post_id = get_the_ID();
            $content_prefix = '';
            // Reading Time
            
            if ( reader_mode_should_show_time() ) {
                $time_position = reader_mode_get_settings( 'timePosition', 'aboveTitle' );
                if ( $time_position === 'aboveContent' ) {
                    $content_prefix .= reader_mode_get_time_html( $post_id );
                }
            }
            
            // Reader Mode Button
            
            if ( reader_mode_should_show_button() ) {
                $button_position = reader_mode_get_settings( 'buttonPosition', 'aboveContent' );
                if ( $button_position === 'aboveContent' ) {
                    $content_prefix .= reader_mode_get_button_html( $post_id );
                }
            }
            
            return '<span class="reader-mode-buttons">' . $content_prefix . '</span>' . $excerpt;
        }
        
        return $excerpt;
    }
    
    /**
     * @return Reader_Mode_Hooks|null
     */
    public static function instance()
    {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}
Reader_Mode_Hooks::instance();