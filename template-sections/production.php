<?php
	$title = carbon_get_theme_option( 'crb_production_title' );
	$descr = carbon_get_theme_option( 'crb_production_descr' );
	$image = carbon_get_theme_option( 'crb_production_image' );
?>
<section class="section production">
	<div class="container production__container">
		<header class="section__header">
			<h2 class="h2 section__title title-decor">
				<?php if ( $title ) { echo $title; } ?>
			</h2>

			<div class="section__descr txt-wrap">
				<?php if ( $descr ) { echo $descr; } ?>
			</div>
		</header>

		<?php if ( $image ) { echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'production__img' ) ); } ?>
	</div>
</section>