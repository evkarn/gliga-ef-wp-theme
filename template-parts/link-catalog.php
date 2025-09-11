<?php
	$text = carbon_get_theme_option( 'crb_link_catalog_text' );
	$link = carbon_get_theme_option( 'crb_link_catalog_link' );
?>
<a
	class="link-catalog flex-align-center"
	href="<?php if ( $link ) { echo $link; } ?>"
	target="_blank"
>
	<svg
		class="link-catalog__svg sprite-svg"
		aria-hidden="true"
	>
		<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite/sprite.svg#file"></use>
	</svg>

	<?php if ( $text ) { echo $text; } ?>
</a>

