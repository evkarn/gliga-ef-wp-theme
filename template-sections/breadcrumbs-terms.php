<?php
	// Получаем текущий пост
	$current_post = get_queried_object();

	// Получаем термины таксономии для текущего поста
	$terms = get_the_terms($current_post->ID, 'equipment_type');

	// Берем первый термин (если есть)
	$current_term = !empty($terms) ? $terms[0] : null;

	// Получаем архивный URL таксономии
	$archive_url = get_post_type_archive_link('equipments');
?>
<section class="section breadcrumbs" aria-labelledby="my-breadcrumbs">
	<div class="container">
		<h2 class="h2 visually-hidden">Ссылки хлебных крошек</h2>

		<nav class="breadcrumbs__nav flex" aria-labelledby="my-breadcrumbs">
			<h2 class="h2 visually-hidden" id="my-breadcrumbs">
				Ссылки хлебных крошек
			</h2>

			<ol class="breadcrumbs__list list-reset" itemscope itemtype="https://schema.org/BreadcrumbList">
				<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<a class="breadcrumbs__link" itemprop="item" href="<?php echo esc_url(home_url('/')); ?>">
						<span itemprop="name">
							Главная
						</span>
					</a>

					<span class="divider"> • </span>

					<meta itemprop="position" content="1">
				</li>

				<li
					class="breadcrumbs__item"
					itemprop="itemListElement"
					itemscope="itemscope"
					itemtype="https://schema.org/ListItem"
				>
					<a
						class="breadcrumbs__link"
						itemprop="item"
						href="<?php echo esc_url(home_url('/')); ?>kuznechnoe-oborudovanie/"
					>
						<span itemprop="name">
							Кузнечное оборудование
						</span>
					</a>

					<span class="divider"> • </span>

					<meta
						itemprop="position"
						content="2"
					>
				</li>

				<?php if ($current_term && !is_wp_error($current_term)): ?>
				<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<a class="breadcrumbs__link" itemprop="item" href="<?php echo esc_url(get_term_link($current_term)); ?>">
						<span itemprop="name">
							<?php echo esc_html($current_term->name); ?>
						</span>
					</a>

					<span class="divider"> • </span>

					<meta itemprop="position" content="3">
				</li>
				<?php endif; ?>

				<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" data-item-active="">
					<span itemprop="name">
						<?php echo esc_html(get_the_title()); ?>
					</span>

					<meta itemprop="position" content="<?php echo $current_term ? '4' : '3'; ?>">
				</li>
			</ol>
		</nav>
	</div>
</section>