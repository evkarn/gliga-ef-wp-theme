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
							<?php if ( $item['img'] ) { echo wp_get_attachment_image( $item['img'], 'full', false, array( 'class' => 'article__img' ) ); } ?>
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