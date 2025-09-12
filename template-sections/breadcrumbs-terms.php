<?php
	$current_page_id = intval(get_queried_object_id());

	$term_name = get_term_field('name', $current_page_id, 'equipment_type');
?>
<section class="section breadcrumbs">
	<div class="container">
		<h2 class="h2 visually-hidden">Ссылки хлебных крошек</h2>

		<nav
			class="breadcrumbs__nav flex"
			aria-labelledby="my-breadcrumbs"
		>
			<h2
				class="h2 visually-hidden"
				id="my-breadcrumbs"
			>
				Ссылки хлебных крошек
			</h2>

			<ol
				class="breadcrumbs__list list-reset"
				itemscope="itemscope"
				itemtype="https://schema.org/BreadcrumbList"
			>
				<li
					class="breadcrumbs__item"
					itemprop="itemListElement"
					itemscope="itemscope"
					itemtype="https://schema.org/ListItem"
				>
					<a
						class="breadcrumbs__link"
						itemprop="item"
						href="<?php echo esc_url(home_url('/')); ?>"
					>
						<span itemprop="name">Главная</span>
					</a>
					<span class="divider"> • </span>
					<meta
						itemprop="position"
						content="1"
					>
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

				<li
					class="breadcrumbs__item"
					itemprop="itemListElement"
					itemscope="itemscope"
					itemtype="https://schema.org/ListItem"
					data-item-active=""
				>
					<span itemprop="name">
						<?php if (!is_wp_error($term_name)) { echo $term_name; } ?>
					</span>

					<meta
						itemprop="position"
						content="3"
					>
				</li>
			</ol>
		</nav>
	</div>
</section>