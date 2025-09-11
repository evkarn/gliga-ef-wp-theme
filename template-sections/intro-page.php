<?php
	$name = carbon_get_the_post_meta( 'crb_intro_page_name' );
	$title = carbon_get_the_post_meta( 'crb_intro_page_title' );
	$info = carbon_get_the_post_meta( 'crb_intro_page_info' );
	$image = carbon_get_the_post_meta( 'crb_intro_page_image' );
	$alt = carbon_get_the_post_meta( 'crb_intro_page_image_alt' );
?>
<section class="section intro-page">
	<div class="container intro-page__container grid">
		<div class="intro-page__column">
			<h1 class="h1 intro-page__title flex-column">
				<span class="intro-page__model">
					<span>
						<?php if ( $name ) { echo esc_html($name); } ?>
					</span>

					<span class="intro-page__badge">
						серия
					</span>
				</span>

				<?php if ( $title ) { echo $title; } ?>
			</h1>

			<span class="intro-page__info">
				<?php if ( $info ) { echo $info; } ?>
			</span>

			<div class="intro-page__buttons flex-align-center">
				<?php get_template_part( 'template-parts/link-catalog' ); ?>

				<button class="intro-page__btn btn btn--fill">
					Отправить запрос
				</button>
			</div>
		</div>

		<div class="intro-page__column">
			<img
				class="intro-page__img"
				src="<?php if ( $image ) { echo $image; } ?>"
				width="590"
				height="615"
				alt="<?php if ( $name ) { echo esc_html($name); } ?> — <?php if ( $title ) { echo $title; } ?>"
			>
		</div>
	</div>
</section>