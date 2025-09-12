<?php
// Запрос для получения прессов с нужной таксономией
$args = array(
	'post_type' => 'presses',
	'posts_per_page' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'press_type',
			'field' => 'slug',
			'terms' => 'universalnye'
		)
	)
);

$presses_query = new WP_Query($args);
?>
<section class="section catalog-category catalog-category--categories">
	<div class="container catalog-category__container">
		<header class="section__header">
			<h2 class="h1 section__title title-decor catalog-category__title">
				<?php if ( $title ) { echo $title; } ?>
			</h2>

			<div class="section__descr txt-wrap">
				<?php if ( $descr ) { echo $descr; } ?>
			</div>
		</header>

		<ul class="catalog-category__products grid">
		<?php if ($presses_query->have_posts()) : ?>
			<?php while ($presses_query->have_posts()) : $presses_query->the_post();
				// Получаем значения кастомных полей
				$model = carbon_get_post_meta(get_the_ID(), 'crb_intro_page_name');

				$description = carbon_get_post_meta(get_the_ID(), 'crb_intro_page_title');

				$additional_info = carbon_get_post_meta(get_the_ID(), 'crb_intro_page_info');

				$image_id = carbon_get_post_meta(get_the_ID(), 'crb_intro_page_image');

				$image_url = wp_get_attachment_image_url($image_id, 'full');

				$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
			?>
			<li class="catalog-category__product">
				<article class="catalog-category__card card card--product flex-column">
					<a class="card__link flex-column" href="<?php the_permalink(); ?>">
						<header class="card__header">
								<?php if ($image_url) : ?>
								<img
									class="catalog-category__img card__img"
									src="<?php echo esc_url($image_url); ?>"
									width="334"
									height="258"
									alt="<?php echo esc_attr($image_alt ?: get_the_title()); ?>"
									loading="lazy"
									decoding="auto"
								>
								<?php endif; ?>
						</header>

						<div class="card__main flex-column">
							<h3 class="h3 card__title">
								<span class="upper card__title-text">
									<?php echo esc_html($model ?: get_the_title()); ?>
								</span>

								<span class="card__minimal">
									серия
								</span>
							</h3>

							<div class="card__descr flex-column">
								<?php echo esc_html($description ?: get_the_excerpt()); ?>
							</div>

							<span class="card__pressure">
								<?php echo esc_html($additional_info); ?>
							</span>
						</div>
					</a>
				</article>
			</li>
			<?php endwhile; wp_reset_postdata(); ?>
			<?php else : echo '<div>Оборудование не найдено</div>'; ?>
		</ul>
		<?php endif; ?>
	</div>
</section>