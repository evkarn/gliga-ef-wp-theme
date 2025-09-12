<?php
/*
	Template Name: About page template
	Template Post Type: page
*/
get_header();
?>
		<main id="primary" class="main main--about">
			<?php get_template_part('template-sections/breadcrumbs'); ?>

			<?php get_template_part('template-sections/about-sec'); ?>

			<?php get_template_part('template-sections/awards'); ?>

			<?php get_template_part('template-sections/production'); ?>

			<?php get_template_part('template-sections/get-offer'); ?>

			<?php get_template_part( 'template-sections/partners' ); ?>
		</main>
<?php

get_footer();
