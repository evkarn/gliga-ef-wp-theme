<?php
	$title = carbon_get_the_post_meta( 'crb_catalog_category_categories_title' );

	$descr = carbon_get_the_post_meta( 'crb_catalog_category_categories_descr' );

	$equipment_types = get_terms([
		'taxonomy' => 'equipment_type',
		'hide_empty' => false, // Показывать даже пустые категории
		'orderby' => 'name',
		'order' => 'DESC'
	]);
?>
<section class="section catalog-category catalog-category--categories">
	<div class="container catalog-category__container">
		<header class="section__header">
			<h2 class="h2 section__title title-decor catalog-category__title">
				<?php if ( $title ) { echo $title; } ?>
			</h2>

			<div class="section__descr txt-wrap">
				<?php if ( $descr ) { echo $descr; } ?>
			</div>
		</header>

		<?php if ($equipment_types && !is_wp_error($equipment_types)) : ?>
		<ul class="catalog-category__products grid">
			<?php foreach ($equipment_types as $equipment_type) :
				// Получаем данные из Carbon Fields
				$pressure = carbon_get_term_meta($equipment_type->term_id, 'crb_equipment_type_pressure');
				$image_id = carbon_get_term_meta($equipment_type->term_id, 'crb_equipment_type_image');

				// Получаем URL изображения
				$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : 'https://via.placeholder.com/332x263';

				// Получаем alt текст изображения
				$image_alt = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : $equipment_type->name;

				// Формируем ссылку на архив типа пресса
				$term_link = get_term_link($equipment_type);
			?>
			<li class="catalog-category__product">
				<article class="catalog-category__card card card--product flex-column">
					<a class="card__link flex-column" href="<?php echo esc_url($term_link); ?>">
						<header class="card__header">
							<img
								class="catalog-category__img card__img"
								src="<?php echo esc_url($image_url); ?>"
								width="334"
								height="258"
								alt="<?php echo esc_attr($image_alt ?: $equipment_type->name); ?>"
								loading="lazy"
								decoding="auto"
							>
						</header>

							<div class="card__main flex-column">
								<h3 class="h3 card__title">
									<span class="upper">
										<?php echo $equipment_type->name; ?>
									</span>
								</h3>

								<?php if (!empty($equipment_type->description)) : ?>
									<div class="card__descr flex-column">
										<?php echo $equipment_type->description; ?>
									</div>
								<?php endif; ?>

								<?php if ($pressure) : ?>
									<span class="card__pressure">
										<?php echo $pressure; ?>
									</span>
								<?php endif; ?>
							</div>
					</a>
				</article>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php else : ?>
			<p>Категории не найдены.</p>
		<?php endif; ?>
	</div>
</section>