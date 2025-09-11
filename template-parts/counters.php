	<section style="display: none;" hidden>
		<h2>
			Счётчики метрики систем аналитики
		</h2>

		<?php
			$code = carbon_get_theme_option( 'crb_metrics_section' );

			if ( $code ) { echo $code; }
		?>
	</section>