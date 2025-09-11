<?php
	$email = carbon_get_theme_option( 'crb_email' );
?>
<a
	class="contacts__link contacts__link--email state-accent flex-align-center"
	href="mailto:<?php if ( $email ) { echo $email; } ?>"
>
	<svg
		class="contacts__icon sprite-svg"
		aria-hidden="true"
	>
		<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite/sprite.svg#mail"></use>
	</svg>

	<span class="contacts__text">
		<?php if ( $email ) { echo $email; } ?>
	</span>
</a>