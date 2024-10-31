<?php

$logs = [
	'v1.0.1' => [
		'date'        => '15 October, 2022',
		'new'         => [
			'',
		],
		'fix'         => [
			'',
		],
		'enhancement' => [
			'',
		],
		'remove'      => [
			'',
		]
	],

];


?>

<div id="what-new" class="getting-started-content content-what-new">
	<div class="content-heading">
		<h2>What's new in the latest changes</h2>
		<p>Check out the latest change logs.</p>
	</div>

	<?php
	$i = 0;
	foreach ( $logs as $v => $log ) { ?>
		<div class="log <?php echo $i == 0 ? 'active' : ''; ?>">
			<div class="log-header">
				<span class="log-version"><?php echo $v; ?></span>
				<span class="log-date">(<?php echo $log['date']; ?>)</span>

				<i class="<?php echo $i == 0 ? 'dashicons-arrow-up-alt2' : 'dashicons-arrow-down-alt2'; ?> dashicons "></i>
			</div>

			<div class="log-body">
				<?php

				if ( ! empty( $log['new'] ) ) {
					echo '<div class="log-section new"><h3>New Features</h3>';
					foreach ( $log['new'] as $item ) {
						echo '<div class="log-item log-item-new"><i class="dashicons dashicons-plus-alt2"></i> <span>' . $item . '</span></div>';
					}
					echo '</div>';
				}


				if ( ! empty( $log['fix'] ) ) {
					echo '<div class="log-section fix"><h3>Fixes</h3>';
					foreach ( $log['fix'] as $item ) {
						echo '<div class="log-item log-item-fix"><i class="dashicons dashicons-saved"></i> <span>' . $item . '</span></div>';
					}
					echo '</div>';
				}

				if ( ! empty( $log['enhancement'] ) ) {
					echo '<div class="log-section enhancement"><h3>Enhancements</h3>';
					foreach ( $log['enhancement'] as $item ) {
						echo '<div class="log-item log-item-enhancement"><i class="dashicons dashicons-star-filled"></i> <span>' . $item . '</span></div>';
					}
					echo '</div>';
				}

				if ( ! empty( $log['remove'] ) ) {
					echo '<div class="log-section remove"><h3>Removes</h3>';
					foreach ( $log['remove'] as $item ) {
						echo '<div class="log-item log-item-remove"><i class="dashicons dashicons-trash"></i> <span>' . $item . '</span></div>';
					}
					echo '</div>';
				}


				?>
			</div>

		</div>
		<?php
		$i ++;
	} ?>


</div>


<script>
    jQuery(document).ready(function ($) {
        $('.log-header').on('click', function () {
            $(this).next('.log-body').slideToggle();
            $(this).find('i').toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
            $(this).parent().toggleClass('active');
        });
    });
</script>