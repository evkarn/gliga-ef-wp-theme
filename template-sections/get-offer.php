<?php
	$bg_color = carbon_get_theme_option( 'crb_get_offer_sec_bg_color' );
	$title = carbon_get_theme_option( 'crb_get_offer_sec_title' );
	$subtitle = carbon_get_theme_option( 'crb_get_offer_sec_subtitle' );
	$success = carbon_get_theme_option( 'crb_get_offer_success' );
?>
<section
	class="section get-offer"
	style="background-color: <?php if ( $bg_color ) { echo $bg_color; } ?>;"
>
	<div class="container get-offer__container">
		<div class="get-offer__body">
			<header class="section__header">
				<h2 class="h2 section__title get-offer__title">
					<?php if ( $title ) { echo $title; } ?>
				</h2>

				<div class="section__descr txt-wrap">
					<?php if ( $subtitle ) { echo $subtitle; } ?>
				</div>
			</header>

			<div class="get-offer__main">
				<?php echo do_shortcode('[contact-form-7 id="c16e7f8" title="Форма секции Получить предложение!" html_class="form get-offer__form flex-column"]'); ?>

				<div class="form-alert center">
					<?php if ( $success ) { echo $success; } ?>
				</div>
			</div>
		</div>
	</div>
</section>