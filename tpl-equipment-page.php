<?php
/*
	Template Name: Single equipment page
	Template Post Type: equipments
*/
get_header();
?>
		<main id="primary" class="main main--product-page">
			<?php get_template_part('template-sections/breadcrumbs'); ?>

			<?php get_template_part('template-sections/intro-page'); ?>

			<?php get_template_part('template-sections/properties'); ?>

			<?php get_template_part('template-sections/descr-series'); ?>

			<?php get_template_part('template-sections/case-details'); ?>

			<?php get_template_part('template-sections/get-offer'); ?>

			<?php get_template_part( 'template-sections/partners' ); ?>
		</main>
<?php

get_footer();
