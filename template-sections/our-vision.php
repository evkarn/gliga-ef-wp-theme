<?php
	$title = carbon_get_theme_option( 'crb_our_vision_title' );

	$vision_title = carbon_get_theme_option( 'crb_our_vision_title_vision' );
	$vision_text = carbon_get_theme_option( 'crb_our_vision_text_vision' );

	$mission_title = carbon_get_theme_option( 'crb_our_vision_mission_title' );
	$mission_text = carbon_get_theme_option( 'crb_our_vision_mission_text' );

	$merits = carbon_get_theme_option( 'crb_our_vision_merits' );
?>
<section class="section our-vision">
	<div class="container our-vision__container">
		<header class="section__header">
			<h2 class="h2 section__title title-decor our-vision__title">
				<?php if ( $title ) { echo esc_html($title); } ?>
			</h2>
		</header>

		<div class="our-vision__main">
			<ul class="our-vision__basics-philosophy basics-philosophy grid">
				<li class="basics-philosophy__item flex-column">
					<h3 class="basics-philosophy__title h3 under">
						<?php echo esc_html( ! empty( $vision_title ) ? $vision_title : 'Виденье компании:' ); ?>
					</h3>

					<div class="our-vision__descr txt-wrap">
						<?php if ( $vision_text ) { echo $vision_text; } ?>
					</div>
				</li>

				<li class="basics-philosophy__item flex-column">
					<h3 class="basics-philosophy__title h3 under">
						<?php echo esc_html( ! empty( $mission_title ) ? $mission_title : 'Миссия компании:' ); ?>
					</h3>

					<div class="our-vision__descr txt-wrap">
						<?php if ( $mission_text ) { echo $mission_text; } ?>
					</div>
				</li>
			</ul>
		</div>

		<ul class="our-vision__list flex">
			<?php if ( ! empty( $merits ) ): ?>
				<?php foreach ( $merits as $merit ): ?>
				<li class="our-vision__item flex-center">
					<?php echo $merit['text'] ?>
				</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
</section>