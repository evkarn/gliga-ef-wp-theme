<?php
	$title = carbon_get_the_post_meta( 'crb_about_sec_title' );
	$descr = carbon_get_the_post_meta( 'crb_about_sec_description' );

	$info_numbers = carbon_get_the_post_meta( 'crb_about_sec_info_numbers' );

	$btn_link = carbon_get_the_post_meta( 'crb_about_sec_btn_link' );

	$btn_text = carbon_get_the_post_meta( 'crb_about_sec_btn_text' );

	$image = carbon_get_the_post_meta( 'crb_about_sec_image' );
?>
<section class="section about-sec">
	<div class="container about-sec__container">
		<header class="section__header about-sec__header flex-column">
			<h2 class="h2 section__title title-decor about-sec__title">
				<?php if ( $title ) { echo $title; } ?>
			</h2>

			<div class="section__descr about-sec__descr txt-wrap flex-column">
				<?php if ( $descr ) { echo $descr; } ?>
			</div>
		</header>

		<div class="about-sec__main flex-column">
			<?php if ( ! empty( $info_numbers ) ): ?>
			<ul class="info-numbers grid">
				<?php foreach ( $info_numbers as $item ): ?>
				<li class="info-numbers__item flex-column">
					<header class="info-numbers__header">
						<span
							class="info-numbers__title"
							data-digital-counter
						>
							<?php echo $item['title'] ?>
						</span>

						<span class="info-numbers__after-symbol">+</span>
					</header>

					<span class="info-numbers__txt">
						<?php echo $item['text'] ?>
					</span>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>

			<div class="about-sec__info flex-column">
				<?php if ( ! empty( $btn_link ) && isset( $btn_link[0]['id'] ) ) {
					$linked_post_id = $btn_link[0]['id'];

					if ( get_post_status( $linked_post_id ) ) {
						$post_url = get_permalink( $linked_post_id );
						$post_title = get_the_title( $linked_post_id );
						?>
						<a class="about-sec__link btn btn--fill" href="<?php echo esc_url( $post_url ); ?>" target="_blank">
							<?php if ( $btn_text ) { echo $btn_text; } ?>
						</a>
						<?php
					}
				} ?>
			</div>
		</div>
	</div>

	<?php if ( $image ) { echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'about-sec__bg' ) ); } ?>
</section>