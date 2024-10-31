<?php

$features = [
	[
		'title' => 'Reader Mode View',
		'pro'   => 0,
	],
	[
		'title' => 'Estimated Reading Time',
		'pro'   => 0,
	],
	[
		'title' => 'Reading Progress Bar',
		'pro'   => 0,
	],
	[
		'title' => 'Specific Posts Types',
		'pro'   => 0,
	],
	[
		'title' => 'Multiple Display Positions',
		'pro'   => 0,
	],
	[
		'title' => 'Print Optimized',
		'pro'   => 0,
	],
	[
		'title' => 'Auto Scroll',
		'pro'   => 0,
	],
	[
		'title' => 'Light/Dark Mode Reader Mode Layout',
		'pro'   => 0,
	],
	[
		'title' => 'Full Screen Mode',
		'pro'   => 0,
	],
	[
		'title' => 'Table of Contents',
		'pro'   => 0,
	],
	[
		'title' => 'Link List',
		'pro'   => 0,
	],


	[
		'title' => 'Text-to-Speech (TTS)',
		'pro'   => true,
	],
	[
		'title' => 'Translation',
		'pro'   => true,
	],
	[
		'title' => 'Multiple Display options',
		'pro'   => true,
	],
	[
		'title' => 'Multiple Button Layouts',
		'pro'   => true,
	],
	[
		'title' => 'Custom Button Text',
		'pro'   => true,
	],
	[
		'title' => 'Custom Button Colors',
		'pro'   => true,
	],
	[
		'title' => 'Custom Button Image Icon',
		'pro'   => true,
	],
	[
		'title' => 'Custom CSS',
		'pro'   => true,
	],
	[
		'title' => 'Custom Button Size',
		'pro'   => true,
	],
	[
		'title' => 'Custom Button Alignment',
		'pro'   => true,
	],
];

?>

<div id="get-pro" class="getting-started-content content-get-pro">
    <div class="content-heading">
        <h2>Unlock the full power of the Reader Mode</h2>
        <p>The amazing PRO features will make your website more user-friendly and comfortable for your users.</p>
    </div>

    <div class="content-heading free-vs-pro">
        <h2><span>Free</span> vs <span>Pro</span></h2>
    </div>

    <div class="features-list">
        <div class="list-header">
            <div class="feature-title">Feature List</div>
            <div class="feature-free">Free</div>
            <div class="feature-pro">Pro</div>
        </div>

		<?php foreach ( $features as $feature ) : ?>
            <div class="feature">
                <div class="feature-title"><?php echo $feature['title']; ?></div>
                <div class="feature-free">
					<?php if ( $feature['pro'] ) : ?>
                        <i class="dashicons dashicons-no-alt"></i>
					<?php else : ?>
                        <i class="dashicons dashicons-saved"></i>
					<?php endif; ?>
                </div>
                <div class="feature-pro">
                    <i class="dashicons dashicons-saved"></i>
                </div>
            </div>
		<?php endforeach; ?>

    </div>

    <div class="get-pro-cta">
        <div class="cta-content">
            <h2>Don't waste time, get the PRO version now!</h2>
            <p>Upgrade to the PRO version of the plugin and unlock all the amazing Google Drive Integration features for
                your website.</p>
        </div>

        <div class="cta-btn">
            <a href="https://demo.softlabbd.com/reader-mode" target="_blank" class="view-demo reader-mode-btn btn-primary">View Demo</a>
            <a href="<?php echo rm_fs()->get_upgrade_url(); ?>" class="reader-mode-btn buy-now btn-primary">Upgrade Now</a>
        </div>

    </div>

</div>