<?php
/*
	Template Name: Home template
	Template Post Type: page
*/
get_header();
?>
		<main id="primary" class="main main--home">
			<?php get_template_part('template-sections/intro-home'); ?>

			<?php get_template_part('template-sections/about-sec'); ?>

			<?php get_template_part('template-sections/catalog-category-categories'); ?>

			<?php get_template_part('template-sections/our-vision'); ?>

			<?php get_template_part('template-sections/get-offer'); ?>

			<?php get_template_part( 'template-sections/partners' ); ?>
		</main>
<?php

get_footer();
