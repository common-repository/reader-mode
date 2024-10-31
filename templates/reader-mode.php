<?php

defined( 'ABSPATH' ) || exit;

$post_id = intval( $_GET['reader-mode'] );

query_posts( [
	'p'         => $post_id,
	'post_type' => get_post_type( $post_id ),

] );

add_filter( 'show_admin_bar', '__return_false' );

// Remove all WordPress actions
remove_all_actions( 'wp_head' );
remove_all_actions( 'wp_print_styles' );
remove_all_actions( 'wp_print_head_scripts' );
remove_all_actions( 'wp_footer' );

// Handle `wp_head`
add_action( 'wp_head', 'wp_enqueue_scripts', 1 );
add_action( 'wp_head', 'wp_print_styles', 8 );
add_action( 'wp_head', 'wp_print_head_scripts', 9 );
add_action( 'wp_head', 'wp_site_icon' );

// Handle `wp_footer`
add_action( 'wp_footer', 'wp_print_footer_scripts', 20 );


// Handle `wp_enqueue_scripts`
remove_all_actions( 'wp_enqueue_scripts' );

// Also remove all scripts hooked into after_wp_tiny_mce.
remove_all_actions( 'after_wp_tiny_mce' );

// Remove the_title and the_content filters
remove_all_filters( 'the_title' );
remove_all_filters( 'the_content' );


// Enqueue Scripts
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'reader-mode', READER_MODE_ASSETS . '/css/reader-mode.css', [ 'dashicons', 'wp-components' ] );

	$custom_css = reader_mode_get_settings( 'customCSS' );

	// Progressbar CSS Variable
	$progressbar_height = reader_mode_get_settings( 'progressbarHeight', '7' );
	$progressbar_color  = reader_mode_get_settings( 'progressbarColor', '#7C7EE5' );

	$progressbar_variable = '';
	$progressbar_variable .= sprintf( '--reader-mode-progress-height: %spx;', $progressbar_height );
	$progressbar_variable .= sprintf( '--reader-mode-progress-color: %s;', $progressbar_color );

	$custom_css .= sprintf( '.reader-mode-progress { %s }', $progressbar_variable );


	// Translation CSS Variable
	$translationBGColor = reader_mode_get_settings( 'translationBGColor', '#2F80ED' );

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

	$custom_css .= sprintf( '.reader-mode-translation { %s }', $translation_variable );


	wp_add_inline_style( 'reader-mode', $custom_css );

	wp_enqueue_script( 'reader-mode', READER_MODE_ASSETS . '/js/reader-mode.js', [
		'jquery',
		'wp-element',
		'wp-components'
	], READER_MODE_VERSION, true );

	wp_localize_script( 'reader-mode', 'readerMode', Reader_Mode_Enqueue::instance()->get_localize_data() );

} );

/*** Content ***/

$title     = get_the_title( $post_id );

$content   = get_post_field( 'post_content', $post_id );
$content = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $content );

$url       = get_the_permalink( $post_id );
$date      = get_the_date( '', $post_id );
$author    = reader_mode_get_author_name( $post_id );
$domain    = str_replace( [ 'http://', 'https://', 'www.' ], [ '', '', '' ], get_site_url() );
$site_icon = get_site_icon_url( 30, 'https://www.google.com/s2/favicons?domain=' . $domain );

$featured_image = get_the_post_thumbnail( $post_id );

if ( $featured_image ) {
	$content = $featured_image . $content;
}


?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_site_icon(); ?>

    <title><?php wp_title( '' ); ?></title>

	<?php do_action( 'wp_head' ); ?>
</head>
<body>

<!-- Reading Progress -->
<?php reader_mode_render_progressbar(); ?>

<div class="reader-mode">

    <!-- Left Sidebar -->
    <aside class="reader-mode-sidebar sidebar-left">
        <div id="reader-mode-toc" class="reader-mode-toc"></div>
        <div id="reader-mode-links" class="reader-mode-links"></div>

    </aside>

    <!-- Content Body -->
    <main class="reader-mode-body">

		<?php if ( reader_mode_get_settings( 'showSourceURL', true ) ) { ?>
            <div class="reader-mode-site">
                <img src="<?php echo esc_attr( $site_icon ); ?>" class="site-favicon">
                <a href="<?php echo esc_url( $url ); ?>" class="site-url"><?php echo esc_url( $url ); ?></a>
            </div>
		<?php } ?>

        <h1 class="reader-mode-title"><?php echo esc_html( $title ); ?></h1>

        <div class="reader-mode-byline">
			<?php


			if ( reader_mode_get_settings( 'showReadingTime', true ) ) {
				echo reader_mode_get_reading_time( $post_id, true );
			}

			?>

			<?php if ( reader_mode_get_settings( 'showDate', true ) ) { ?>
                <div class="reader-mode-date">
                    <i class="dashicons dashicons-calendar-alt"></i>
                    <span><?php echo esc_html( $date ); ?></span>
                </div>
			<?php } ?>

			<?php if ( reader_mode_get_settings( 'showAuthor', true ) ) { ?>
                <div class="reader-mode-author">
                    <i class="dashicons dashicons-admin-users"></i>
                    <span><?php echo esc_html( $author ); ?></span>
                </div>
			<?php } ?>
        </div>

        <div class="reader-mode-content">
			<?php echo wpautop( $content ); ?>
        </div>

        <div class="reader-mode-share"></div>

    </main>

    <!-- Right Sidebar -->
    <aside class="reader-mode-sidebar sidebar-right">
        <div id="reader-mode-tools" class="reader-mode-tools-wrap"></div>
    </aside>

</div>

<?php do_action( 'wp_footer' ); ?>
</body>
</html>