<?php
	$title = carbon_get_theme_option( 'crb_awards_title' );
	$descr = carbon_get_theme_option( 'crb_awards_descr' );
	$image = carbon_get_theme_option( 'crb_awards_image' );
?>
<section class="section awards">
	<div class="container awards__container">
		<header class="section__header">
			<h2 class="h2 section__title title-decor awards__title">
				<?php if ( $title ) { echo $title; } ?>
			</h2>

			<div class="section__descr txt-wrap">
				<?php if ( $descr ) { echo $descr; } ?>
			</div>
		</header>

		<?php if ( $image ) { echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'awards__img' ) ); } ?>
	</div>
</section>