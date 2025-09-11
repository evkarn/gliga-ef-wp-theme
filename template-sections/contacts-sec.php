<?php
	$title = carbon_get_the_post_meta( 'crb_contacts_sec_title' );
	$map_code = carbon_get_the_post_meta( 'crb_contacts_sec_map' );
	$address = carbon_get_theme_option( 'crb_full_address' );
	$work_time = carbon_get_theme_option( 'crb_work_time' );
?>
<section class="section contacts-sec">
	<div class="container contacts-sec__container">
		<header class="section__header visually-hidden">
			<h2 class="h2 section__title contacts-sec__title">
				<?php if ( $title ) { echo $title; } ?>
			</h2>
		</header>

		<div class="contacts-sec__main grid">
			<div class="contacts-sec__map">
				<?php if ( $map_code ) { echo $map_code; } ?>
			</div>

			<address class="contacts-sec__contacts flex-column">
				<div class="contacts-sec__row flex-column">
					<span class="contacts-sec__label">
						Адрес:
					</span>

					<span class="contacts-sec__txt">
						<?php if ( $address ) { echo $address; } ?>
					</span>
				</div>

				<div class="contacts-sec__row flex-column">
					<span class="contacts-sec__label">
						Режим работы:
					</span>

					<span class="contacts-sec__txt">
						<?php if ( $work_time ) { echo $work_time; } ?>
					</span>
				</div>

				<div class="contacts-sec__row flex-column">
					<span class="contacts-sec__label">
						Телефоны:
					</span>

					<?php get_template_part( 'template-parts/contacts/phone-one' ); ?>

					<?php get_template_part( 'template-parts/contacts/phone-two' ); ?>
				</div>

				<div class="contacts-sec__row flex-column">
					<span class="contacts-sec__label">
						E-mail:
					</span>

					<?php get_template_part( 'template-parts/contacts/email' ); ?>
				</div>

				<div class="contacts-sec__row flex-column">
					<?php get_template_part( 'template-parts/contacts/socials' ); ?>
				</div>
			</address>
		</div>
	</div>
</section>