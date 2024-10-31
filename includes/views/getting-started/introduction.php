<?php

$features = [
	'custom-button-text'       => [
		'title'       => __( 'Custom Button Text & Size', 'reader-mode' ),
		'description' => __( 'You can change the button text and size to match your theme.', 'reader-mode' ),
	],
	'multiple-display-options' => [
		'title'       => __( 'Multiple Display Options', 'reader-mode' ),
		'description' => __( 'The Reader mode button, Reading time, Translation button, Text to speech button, Reading progressbar can be
        displayed both in the General mode and Reader mode layout.', 'reader-mode' ),
	],

	'post-types'      => [
		'title'       => __( 'Specific Post Types', 'reader-mode' ),
		'description' => __( 'Reader mode can be enabled for only specific posts types.', 'reader-mode' ),
	],
	'custom-fonts'    => [
		'title'       => __( 'Custom Fonts', 'reader-mode' ),
		'description' => __( 'You can set any custom Google Fonts for the Reader Mode view. Users also can set their own custom fonts for the
        Reader Mode view.', 'reader-mode' ),
	],
	'font-size'       => [
		'title'       => __( 'Custom Font Size', 'reader-mode' ),
		'description' => __( 'You can set any custom font size for the Reader Mode view. Users also customized the font size in the Reader
        Mode view.', 'reader-mode' ),
	],
	'print-optimized' => [
		'title'       => __( 'Print Optimized', 'reader-mode' ),
		'description' => __( 'Reader Mode is print optimized for the users to print the post/ article.', 'reader-mode' ),
	],
	'customizable'    => [
		'title'       => __( 'Fully customizable', 'reader-mode' ),
		'description' => __( 'Reader Mode is fully customizable for both the admins & users. Admin can easily customize the various buttons
        with different layout and colors and also customize the Reader Mode layout. ', 'reader-mode' ),
	],
	'fullscreen'      => [
		'title'       => __( 'Fullscreen Mode', 'reader-mode' ),
		'description' => __( 'Fullscreen reading mode is available in the reader mode for the users to read the post/ article in fullscreen
        mode.', 'reader-mode' ),
	],
	'auto-scroll'     => [
		'title'       => __( 'Auto-scroll', 'reader-mode' ),
		'description' => __( 'Auto scroll feature is available in the reader mode for the users to scroll the post/ article automatically while they
        are reading the post/ article.', 'reader-mode' ),
	],
	'toc'             => [
		'title'       => __( 'Table of contents', 'reader-mode' ),
		'description' => __( 'Table of contents feature is available in the reader mode for the users to navigate to the specific section of
        the post/ article.', 'reader-mode' ),
	],
	'link-list'       => [
		'title'       => __( 'Link List', 'reader-mode' ),
		'description' => __( 'All the links in the post/ article will be listed in the reader mode for the users to navigate to the specific
        link in the post/ article.', 'reader-mode' ),
	],
	'custom-css'      => [
		'title'       => __( 'Custom CSS', 'reader-mode' ),
		'description' => __( 'Reader mode layout can be customized by using the custom CSS.', 'reader-mode' ),
	],

];

?>

<div id="introduction" class="getting-started-content active">

    <section class="section-introduction section-full">
        <div class="col-description">
            <h2>Quick Overview</h2>
            <p>
                Reader Mode adds a distraction free reading layout for a better readability for the users on every post/
                article by strips away clutter and unnecessary elements from the post/ article.
            <p>

            </p>
            Reader Mode adds a comfortable reading experience for the users by adding some useful features, such as:
            Simple Reader Mode layout, Reading time, Translation, Text to Speech, Reading Progress, and more.
            </p>
        </div>

        <div class="col-image">
            <iframe
                    src="https://www.youtube.com/embed/Z--ZC0ZPiGs?rel=0"
                    title="YouTube video player" frameBorder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowFullScreen></iframe>
        </div>
    </section>

    <div class="content-heading">
        <h2><?php esc_html_e( 'Never miss a valuable features', 'reader-mode' ); ?></h2>
        <p><?php esc_html_e( 'Let\'s explore the awesome features of the plugin', 'reader-mode' ); ?></p>
    </div>

    <div class="section-wrap">
        <section class="section-reader-mode section-half">
            <div class="col-description">
                <h2>Simple Reader Mode layout</h2>
                <p> Reader Mode adds a simple and clean layout for a better readability for the users on every post/
                    article
                    by strips away clutter and unnecessary elements from the post/ article.</p>
            </div>

            <div class="col-image">
                <img src="<?php echo READER_MODE_URL . '/assets/images/getting-started/reader-mode-layout.png'; ?>"
                     alt="Reader Mode Layout">
            </div>

        </section>
        <section class="section-dark-mode section-half">
            <div class="col-description">

                <h2>Light/ Dark Mode Theme</h2>
                <p> Reader Mode has a light/ dark mode theme for the users to choose the best one for their reading
                    preference.
                    Reader mode theme also can be changed based on the user's device light/dark theme.</p>
            </div>

            <div class="col-image">
                <img src="<?php echo READER_MODE_URL . '/assets/images/getting-started/dark-mode.png'; ?>"
                     alt="Dark Mode">
            </div>
        </section>
    </div>

    <div class="section-wrap">
        <section class="section-translation section-half">
            <div class="col-description">
                <h2>Translation</h2>
                <p> Reader Mode adds a translation button both in the general mode and reader mode layout for the users
                    to translate
                    the post/ article to their language.</p>
            </div>

            <div class="col-image">
                <img src="<?php echo READER_MODE_URL . '/assets/images/getting-started/translation.png'; ?>"
                     alt="Translation">
            </div>
        </section>
        <section class="section-text-to-speech section-half">
            <div class="col-description">
                <h2>Text to Speech</h2>
                <p> Reader Mode adds a text to speech button both in the general mode and reader mode for the users to
                    listen to the
                    post/ article.</p>
            </div>
            <div class="col-image">
                <img src="<?php echo READER_MODE_URL . '/assets/images/getting-started/text-to-speech.png'; ?>"
                     alt="Text to Speech">
            </div>
        </section>
    </div>

    <div class="section-wrap">
        <section class="section-reading-time section-half">
            <div class="col-description">
                <h2>Reading Time</h2>
                <p> Reader Mode adds a reading time for the users to know how much time they need to read the post/
                    article.</p>
            </div>
            <div class="col-image">
                <img src="<?php echo READER_MODE_URL . '/assets/images/getting-started/reading-time.png'; ?>"
                     alt="Reading Time">
            </div>
        </section>
        <section class="section-reading-progress section-half">
            <div class="col-description">
                <h2>Reading Progress</h2>
                <p> Reader Mode adds a customizable reading progress bar for the users to know how much they read from
                    the post/ article.</p>

            </div>
            <div class="col-image">
                <img src="<?php echo READER_MODE_URL . '/assets/images/getting-started/reading-progress.png'; ?>"
                     alt="Reading Progress">
            </div>
        </section>
    </div>

    <div class="section-wrap">
        <section class="section-multiple-positions section-half">
            <div class="col-description">
                <h2>Multiple Display Positions</h2>
                <p> The Reader mode button, reading time, translation button, text to speech button, reading progressbar
                    can be
                    displayed in multiple positions. such as: Above the post title, Below the post title and Above the
                    post
                    content.</p>
            </div>
            <div class="col-image">
                <img src="<?php echo READER_MODE_URL . '/assets/images/getting-started/multiple-display-positions.png'; ?>"
                     alt="Multiple Display Positions">
            </div>
        </section>
        <section class="section-multiple-buttons section-half">
            <div class="col-description">
                <h2>Multiple Buttons & Styles</h2>
                <p> Multiple highly customizable buttons and styles are available for the Reader Mode, Translation, Text
                    to speech
                    and Reading time.</p>
            </div>
            <div class="col-image">
                <img src="<?php echo READER_MODE_URL . '/assets/images/getting-started/multiple-buttons-styles.png'; ?>"
                     alt="Multiple Buttons & Styles">
            </div>
        </section>
    </div>

    <div class="content-heading">
        <h2><?php esc_html_e( 'More powerful features', 'reader-mode' ); ?></h2>
        <p><?php esc_html_e( 'More extra valuable features to power up your website readability.', 'reader-mode' ); ?></p>
    </div>

    <section class="integrations">
		<?php foreach ( $features as $key => $feature ) { ?>
            <div class="integration">
                <div class="integration-logo">
                    <img src="<?php echo READER_MODE_ASSETS . '/images/getting-started/' . $key . '.png'; ?>" alt="<?php echo $feature['title'] ?>">
                </div>
                <h3 class="integration-title"><?php echo $feature['title'] ?></h3>
                <p><?php echo $feature['description']; ?></p>
            </div>
		<?php } ?>
    </section>

</div>