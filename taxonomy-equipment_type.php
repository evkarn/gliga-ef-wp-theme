<?php
/*
	Шаблон для таксономии 'press_type'
*/
get_header('term');
?>
		<main id="primary" class="main">
			<?php get_template_part('template-sections/breadcrumbs-terms'); ?>

			<?php get_template_part('template-sections/intro-image-for-page'); ?>

			<?php get_template_part('template-sections/catalog-category-h1'); ?>

			<?php get_template_part('template-sections/get-offer'); ?>

			<?php get_template_part( 'template-sections/partners' ); ?>
		</main>
<?php

get_footer();