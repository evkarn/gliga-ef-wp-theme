<?php
/*
	Template Name: Equipments page template
	Template Post Type: page
*/
get_header();
?>
		<main id="primary" class="main">
			<?php get_template_part('template-sections/breadcrumbs'); ?>

			<?php get_template_part('template-sections/intro-title'); ?>

			<?php get_template_part('template-sections/intro-image'); ?>

			<?php get_template_part('template-sections/catalog-category-hammers'); ?>

			<?php get_template_part('template-sections/catalog-category-kovochnye-valczy'); ?>

			<?php get_template_part('template-sections/catalog-category-gkm'); ?>

			<?php get_template_part('template-sections/catalog-category-presses'); ?>

			<?php get_template_part('template-sections/catalog-category-kolczeprokatnye-stany'); ?>

			<?php get_template_part('template-sections/get-offer'); ?>

			<?php get_template_part( 'template-sections/partners' ); ?>
		</main>
<?php

get_footer();
