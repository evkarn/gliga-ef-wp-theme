<?php
	$title = carbon_get_the_post_meta( 'crb_descr_series_title' );

	$descr_card = carbon_get_the_post_meta( 'crb_descr_series_descr_card' );

	$cards = carbon_get_the_post_meta( 'crb_descr_series_cards' );

	$image = carbon_get_the_post_meta( 'crb_descr_series_image' );

	$merits = carbon_get_the_post_meta( 'crb_descr_series_merits' );

	$accent_el = carbon_get_the_post_meta( 'crb_descr_series_accent_el' );
?>
<section class="section descr-series">
	<div class="container descr-series__container">
		<header class="section__header">
			<h2 class="h2 section__title descr-series__title title-decor">
				<?php if ( $title ) { echo $title; } ?><?php the_title(); ?>
			</h2>
		</header>

		<div class="descr-series__main flex-column">
			<div class="card-list-wrap flex-column-center">
			<?php if ( ! empty( $cards ) ): ?>
				<?php foreach ( $cards as $card ): ?>
				<div class="card-list flex-column">
					<?php if ( ! empty ( $card['descr'] ) ): ?>
					<div class="card-list__descr txt-wrap">
						<?php { echo $card['descr']; } ?>
					</div>
					<?php endif ?>

					<?php if ( ! empty( $card['list'] ) ): ?>
						<ul class="card-list__ul flex-column">
							<?php foreach ( $card['list'] as $item ): ?>
							<li class="card-list__item flex">
								<?php echo $item['title'] ?>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>

				<div class="accent-el flex-center">
					<?php if ( $accent_el ) { echo $accent_el; } ?>
				</div>
			</div>
		</div>
	</div>
</section>