<?php
/*
	Template Name: Contacts page template
	Template Post Type: page
*/
get_header();
?>
		<main id="primary" class="main">
			<?php get_template_part('template-sections/breadcrumbs'); ?>

			<?php get_template_part('template-sections/contacts-sec'); ?>

			<?php get_template_part('template-sections/get-offer'); ?>

			<?php get_template_part( 'template-sections/partners' ); ?>
		</main>
<?php

get_footer();
