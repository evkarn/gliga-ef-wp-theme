<?php
	$title = carbon_get_the_post_meta( 'crb_case_details_title' );
	$items_list = carbon_get_the_post_meta( 'crb_case_details_items_list' );
?>
<section class="section case-details">
	<div class="container case-details__container">
		<header class="section__header">
			<h2 class="h2 section__title title-decor case-details__title">
				<?php if ( $title ) { echo $title; } ?>
			</h2>
		</header>

		<div class="case-details__main">
			<?php if ( ! empty( $items_list ) ): ?>
			<ul class="case-details__list grid">
				<?php foreach ( $items_list as $item ): ?>
				<li class="case-details__item">
					<article class="case-details__article article article--detail flex-column-center">
						<header class="article__img-wrap">
							<img
								class="article__img case-details__img"
								src="<?php if ( $item['img'] ) { echo wp_get_attachment_image_url( $item['img'], 'full' ); } ?>"
								width="340"
								height="212"
								alt="<?php if ( $item['img'] ) { $alt_text = get_post_meta( $item['img'], '_wp_attachment_image_alt', true ); echo $alt_text ? esc_attr( $alt_text ) : 'Описание изображения'; } else { echo 'Описание изображения'; } ?>"
								loading="lazy"
								decoding="auto"
							>
						</header>

						<div class="article__main">
							<h3 class="article__title">
								<?php echo $item['title'] ?>
							</h3>
						</div>
					</article>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
	</div>
</section>