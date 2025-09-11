<?php
/*
	Template Name: Policy page template
	Template Post Type: page
*/
get_header();
?>
		<main id="primary" class="main">
			<section class="section policy">
				<div class="container policy__container">
					<header class="section__header flex-column">
						<h1 class="h1 section__title">
							<?php the_title(); ?>
						</h1>
					</header>

					<div class="policy__main entry-content flex-column">
						<?php the_content(); ?>
					</div>
				</div>
			</section>
		</main>
<?php

get_footer();
