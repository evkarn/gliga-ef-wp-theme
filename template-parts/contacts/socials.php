<?php $telegram = carbon_get_theme_option( 'crb_socials_telegram' ); ?>
<?php $whatsapp = carbon_get_theme_option( 'crb_socials_whatsapp' ); ?>
<div class="socials flex">
	<a
		class="socials__link socials__link--telegram state-opacity"
		href="<?php if ( $telegram ) { echo $telegram; } ?>"
		aria-label="Связаться с нами через Телеграм"
		target="_blank"
	></a>

	<a
		class="socials__link socials__link--wats-app state-opacity"
		href="<?php if ( $whatsapp ) { echo $whatsapp; } ?>"
		aria-label="Связаться с нами через Ватсап"
		target="_blank"
	></a>
</div>