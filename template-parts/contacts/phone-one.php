<?php $phone_one = carbon_get_theme_option( 'crb_phone_one' ); ?>
<a
	class="contacts__link contacts__link--phone state-accent flex-align-center"
	href="tel:<?php if ( $phone_one ) { echo str_replace([' ', '(', ')', '-', '—'], '', $phone_one); } ?>"
>
	<svg
		class="contacts__icon sprite-svg"
		aria-hidden="true"
	>
		<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite/sprite.svg#phone"></use>
	</svg>

	<span class="contacts__text">
		<?php if ( $phone_one ) { echo $phone_one; } ?>
	</span>
</a>
