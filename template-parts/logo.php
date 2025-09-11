<?php
	$logo = carbon_get_theme_option( 'crb_logo' );
?>
<?php if ( is_front_page() ) : ?>
	<span class="logo">
		<?php if ( $logo ) { echo wp_get_attachment_image( $logo, 'full', false, array(
			'class' => 'logo__img',
		) ); } ?>
	</span>
<?php else : ?>
	<a
		href="<?php echo esc_url(home_url('/')); ?>"
		class="logo"
	>
		<?php if ( $logo ) { echo wp_get_attachment_image( $logo, 'full', false, array(
			'class' => 'logo__img',
		) ); } ?>
	</a>
<?php endif; ?>