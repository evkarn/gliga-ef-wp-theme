<?php
	$image = carbon_get_the_post_meta( 'crb_presses_page_content_image' );
	$title = carbon_get_the_post_meta( 'crb_presses_page_content_title' );
	$descr = carbon_get_the_post_meta( 'crb_presses_page_content_description' );
	$cards = carbon_get_the_post_meta( 'crb_presses_page_content_cards' );
?>
<section class="section page-content">
	<div class="container page-content__container">
		<header class="section__header">
			<?php if ( $image ) { echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'page-content__img' ) ); } ?>

			<h1 class="h1 section__title title-decor page-content__title">
				<?php if ( $title ) { echo $title; } ?>
			</h1>

			<div class="section__descr txt-wrap">
				<?php if ( $descr ) { echo $descr; } ?>
			</div>
		</header>

		<div class="page-content__main">
			<div class="page-content__cards grid">
				<?php if ( ! empty( $cards ) ): ?>
					<?php foreach ( $cards as $card ): ?>
						<?php
							$linked_post = !empty($card['link']) ? $card['link'][0] : null;
							$link_url = $linked_post ? get_permalink($linked_post['id']) : '#';
						?>
						<article class="page-content__card card card--product">
							<a
								class="card__link flex-column"
								href="<?php echo esc_url($link_url); ?>"
							>
								<header class="card__header">
									<div class="card__img-wrap">
										<?php if ( $card['img'] ) { echo wp_get_attachment_image( $card['img'], 'full', false, array( 'class' => 'card__img', 'width' => '340', 'height' => '258' ) ); } ?>

										<?php if (!empty($card['show_badge']) && !empty($card['badge_text'])) : ?>
											<span class="badge badge--fill">
												<?php echo esc_html($card['badge_text']); ?>
											</span>
										<?php endif; ?>
									</div>
								</header>

								<div class="card__main flex-column">
									<h3 class="h3 card__title">
										<span class="upper">
											<?php echo $card['model'] ?>
										</span>

										<span class="card__minimal">
											<?php echo $card['model_after'] ?>
										</span>
									</h3>

									<div class="card__descr flex-column">
										<?php echo $card['model_descr'] ?>
									</div>

									<span class="card__pressure">
										<?php echo $card['pressure'] ?>
									</span>
								</div>
							</a>
						</article>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>