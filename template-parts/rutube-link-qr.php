<?php
	$link = carbon_get_theme_option( 'crb_rutube_link' );
	$text = carbon_get_theme_option( 'crb_rutube_text' );
	$image = carbon_get_theme_option( 'crb_rutube_image' );
?>
<a
	class="ru-tube flex-column"
	href="<?php if ( $link ) { echo $link; } ?>"
	target="_blank"
>
	<div class="ru-tube__header flex-center">
		<?php if ( $image ) { echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'ru-tube__icon', 'width' => '140', 'height' => '140' ) ); } ?>
	</div>

	<div class="ru-tube__footer">
		<?php if ( $text ) { echo $text; } ?>
	</div>
</a>