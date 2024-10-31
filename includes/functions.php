<?php

defined( 'ABSPATH' ) || exit;


function reader_mode_get_author_name( $post_id ) {
	$post = get_post( $post_id );

	$author_id = $post->post_author;

	return get_the_author_meta( 'display_name', $author_id );

}

function reader_mode_get_reading_time( $post_id, $with_markup = false ) {

	$content = get_post_field( 'post_content', $post_id );

	$content               = wp_strip_all_tags( $content );
	$words                 = str_word_count( $content );
	$words_per_minute_slow = 200;
	$words_per_minute_fast = 280;

	$reading_time_slow = ceil( $words / $words_per_minute_slow );
	$reading_time_fast = ceil( $words / $words_per_minute_fast );

	if ( $reading_time_slow == 0 && $reading_time_fast == 0 ) {
		$reading_time_slow = 1;
		$reading_time_fast = 1;
	}

	if ( $reading_time_slow == $reading_time_fast ) {
		$time = sprintf( '%s', $reading_time_slow );
	} else {
		$time = sprintf( '%s - %s', $reading_time_fast, $reading_time_slow );
	}

	if ( $with_markup ) {
		$time_text = reader_mode_get_settings( 'timeText', '%time% minutes read' );
		$time_text = str_replace( '%time%', $time, $time_text );
		$time      = '<div class="reader-mode-time"><i class="dashicons dashicons-clock"></i> ' . $time_text . '</div>';
	}

	return $time;

}

function reader_mode_get_post_type_list() {
	$post_types = get_post_types( array( "public" => true ), 'objects' );
	$excludes   = array( 'attachment', 'elementor_library', 'Media', 'My Templates' );

	$list = [];
	foreach ( $post_types as $key => $obj ) {
		if ( in_array( $obj->label, $excludes ) ) {
			continue;
		}
		$list[] = [ 'value' => $key, 'label' => $obj->labels->name ];
	}

	return $list;
}

function reader_mode_get_current_theme() {
	$theme = wp_get_theme();

	if ( isset( $theme->parent_theme ) && '' != $theme->parent_theme || null != $theme->parent_theme ) {

		$theme_name = $theme->parent_theme;

	} else {

		$theme_name = $theme->name;
	}

	return $theme_name;
}

function reader_mode_render_progressbar() {
	$position = reader_mode_get_settings( 'progressPosition', 'top' );
	?>
    <div class="reader-mode-progress position-<?php echo esc_attr( $position ); ?>">
        <div class="reader-mode-progress-fill"></div>
    </div>
<?php }

function reader_mode_get_settings( $key, $default = null ) {
	$settings = get_option( 'reader_mode_settings', [] );
	if ( isset( $settings[ $key ] ) ) {
		return $settings[ $key ];
	}

	return $default;
}

function reader_mode_get_button_html( $post_id ) {
	$readerModeStyle      = reader_mode_get_settings( 'readerModeStyle', 'default' );
	$buttonSize           = reader_mode_get_settings( 'buttonSize', 'medium' );
	$readerModeText       = reader_mode_get_settings( 'readerModeText', 'Reader Mode' );
	$readerModeIcon       = reader_mode_get_settings( 'readerModeIcon', 1 );
	$customReaderModeIcon = reader_mode_get_settings( 'customReaderModeIcon', '' );

	$icon = '';

	if ( $customReaderModeIcon ) {
		$icon_url = $customReaderModeIcon;
		$icon     = sprintf( '<img class="reader-mode-button__icon custom-icon" src="%s" />', $icon_url );
	} else if ( $readerModeIcon ) {
		$icon_url = 'url(../images/icons/reader-mode/' . $readerModeIcon . '.svg) no-repeat center / contain';
		$icon     = sprintf( '<span class="reader-mode-button__icon" style="--reader-mode-icon: %s"></span>', $icon_url );
	}

	if ( ! empty( $icon ) ) {
		$icon = sprintf( '<span class="reader-mode-icon-wrap">%s</span>', $icon );
	}

	$reader_mode_text = sprintf( '<span class="reader-mode-button__text">%s</span>', $readerModeText );

	$html = sprintf( '<span class="reader-mode-button style-%s size-%s" data-post-id="%s">%s%s</span>', $readerModeStyle, $buttonSize, $post_id, $icon, $reader_mode_text );

	return $html;

}

function reader_mode_get_tts_html() {
	$TTSStyle   = reader_mode_get_settings( 'TTSStyle', 'default' );
	$buttonSize = reader_mode_get_settings( 'buttonSize', 'medium' );
	$TTSText    = reader_mode_get_settings( 'TTSText', 'Text to speech' );

	$TTSIcon       = reader_mode_get_settings( 'TTSIcon', 1 );
	$customTTSIcon = reader_mode_get_settings( 'customTTSIcon', '' );

	$icon = '';

	if ( $customTTSIcon ) {
		$icon_url = $customTTSIcon;
		$icon     = sprintf( '<img class="reader-mode-tts__icon custom-icon" src="%s" />', $icon_url );
	} else if ( $TTSIcon ) {
		$icon_url = 'url(../images/icons/tts/' . $TTSIcon . '.svg) no-repeat center / contain';
		$icon     = sprintf( '<span class="reader-mode-tts__icon" style="--tts-icon: %s"></span>', $icon_url );
	}

	if ( ! empty( $icon ) ) {
		$icon = sprintf( '<span class="tts-icon-wrap">%s</span>', $icon );
	}

	$tts_text = sprintf( '<span class="reader-mode-tts__text">%s</span>', $TTSText );

	$html = sprintf( '<span class="reader-mode-tts style-%s size-%s" >%s %s <span id="reader-mode-tts"></span></span>', $TTSStyle, $buttonSize, $icon, $tts_text );

	return $html;

}

function reader_mode_get_time_html( $post_id ) {
	$reading_time = reader_mode_get_reading_time( $post_id );

	$timeStyle      = reader_mode_get_settings( 'timeStyle', 'default' );
	$buttonSize     = reader_mode_get_settings( 'buttonSize', 'medium' );
	$timeIcon       = reader_mode_get_settings( 'timeIcon', 1 );
	$customTimeIcon = reader_mode_get_settings( 'customTimeIcon', '' );

	$icon = '';
	if ( $customTimeIcon ) {
		$icon_url = $customTimeIcon;
		$icon     = sprintf( '<img class="reader-mode-time__icon custom-icon" src="%s" />', $icon_url );
	} else if ( $timeIcon ) {
		$icon_url = 'url(../images/icons/time/' . $timeIcon . '.svg) no-repeat center / contain';
		$icon     = sprintf( '<span class="reader-mode-time__icon" style="--time-icon: %s"></span>', $icon_url );
	}

	if ( ! empty( $icon ) ) {
		$icon = sprintf( '<span class="time-icon-wrap">%s</span>', $icon );
	}

	$timeText  = reader_mode_get_settings( 'timeText', '%time% minutes read' );
	$timeText  = str_replace( '%time%', $reading_time, $timeText );
	$time_text = sprintf( '<span class="reader-mode-time__text">%s</span>', $timeText );

	return sprintf( '<span class="reader-mode-time style-%s size-%s">%s %s</span>', $timeStyle, $buttonSize, $icon, $time_text );
}

function reader_mode_get_translation_html() {
	$translationStyle = reader_mode_get_settings( 'translationStyle', 'default' );
	$buttonSize       = reader_mode_get_settings( 'buttonSize', 'medium' );

	$translationIcon       = reader_mode_get_settings( 'translationIcon', 1 );
	$customTranslationIcon = reader_mode_get_settings( 'customTranslationIcon', '' );


	return sprintf( '<span id="reader-mode-translation" class="reader-mode-translation style-%s size-%s %s"></span>', $translationStyle, $buttonSize, empty( $translationIcon ) && empty( $customTranslationIcon ) ? 'no-icon' : '' );
}

function reader_mode_should_render( $post_id ) {
	$post_type = get_post_type( $post_id );

	$post_types = reader_mode_get_settings( 'postTypes', [ 'post' ] );

	return in_array( $post_type, $post_types );

}

function reader_mode_color_brightness( $hex, $steps ) {

	// return if not hex color
	if ( ! preg_match( '/^#([a-f0-9]{3}){1,2}$/i', $hex ) ) {
		return $hex;
	}

	// Steps should be between -255 and 255. Negative = darker, positive = lighter
	$steps = max( - 255, min( 255, $steps ) );

	// Normalize into a six character long hex string
	$hex = str_replace( '#', '', $hex );
	if ( strlen( $hex ) == 3 ) {
		$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
	}

	// Split into three parts: R, G and B
	$color_parts = str_split( $hex, 2 );
	$return      = '#';

	foreach ( $color_parts as $color ) {
		$color  = hexdec( $color ); // Convert to decimal
		$color  = max( 0, min( 255, $color + $steps ) ); // Adjust color
		$return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT ); // Make two char hex code
	}

	return $return;
}

function reader_mode_should_show_time() {
	$enable_reading_time = reader_mode_get_settings( 'enableReadingTime', true );
	$timeDisplay         = reader_mode_get_settings( 'timeDisplay', [ 'single' ] );

	$should_show_single  = in_array( 'single', $timeDisplay ) && is_singular();
	$should_show_blog    = in_array( 'blog', $timeDisplay ) && is_home();
	$should_show_archive = in_array( 'archive', $timeDisplay ) && is_archive();
	$should_show_search  = in_array( 'search', $timeDisplay ) && is_search();

	return $enable_reading_time && ( $should_show_single || $should_show_blog || $should_show_archive || $should_show_search );

}

function reader_mode_should_show_button() {
	$enable_reader_mode = reader_mode_get_settings( 'enableReaderMode', true );
	$readerModeDisplay  = reader_mode_get_settings( 'readerModeDisplay', [ 'single' ] );

	$should_show_single  = in_array( 'single', $readerModeDisplay ) && is_singular();
	$should_show_blog    = in_array( 'blog', $readerModeDisplay ) && is_home();
	$should_show_archive = in_array( 'archive', $readerModeDisplay ) && is_archive();
	$should_show_search  = in_array( 'search', $readerModeDisplay ) && is_search();

	return $enable_reader_mode && ( $should_show_single || $should_show_blog || $should_show_archive || $should_show_search );
}