<?php
	$title = carbon_get_the_post_meta( 'crb_intro_home_title' );
	$slides = carbon_get_the_post_meta( 'crb_intro_home_slides' );
?>
<section class="section intro">
	<h1 class="h1 intro__main-title visually-hidden">
		<?php if ( $title ) { echo $title; } ?>
	</h1>

	<div class="intro__slider intro-slider swiper">
		<div class="swiper-wrapper">
			<?php if ( ! empty( $slides ) ): ?>
				<?php foreach ( $slides as $slide ): ?>
				<div class="swiper-slide">
					<div class="intro__content">
						<?php if ( $slide['media_type'] === 'image' && ! empty( $slide['image'] ) ): ?>
							<img
								class="intro__img section__bg"
								src="<?php echo wp_get_attachment_image_url( $slide['image'], 'full' ); ?>"
								width="1920"
								height="900"
								alt="<?php echo esc_attr( $slide['title'] ); ?>"
								decoding="auto"
								aria-hidden="true"
							>
						<?php elseif ( $slide['media_type'] === 'video' && ! empty( $slide['video'] ) ): ?>
							<video
								class="intro__video"
								autoplay
								muted
								loop
								playsinline
								poster="<?php echo ! empty( $slide['poster'] ) ? $slide['poster'] : ''; ?>"
							>
								<source
									src="<?php echo $slide['video']; ?>"
									type="video/<?php echo ! empty( $slide['format'] ) ? $slide['format'] : 'mp4'; ?>"
								>
								<p>
									Ваш браузер не&nbsp;поддерживает встроенные видео. Попробуйте скачать его по
									<a href="<?php echo $slide['video']; ?>">этой ссылке</a>.
								</p>
							</video>
						<?php endif; ?>

						<div class="container intro__info flex-column">
							<h2 class="intro__title">
								<?php echo $slide['title'] ?>
							</h2>

							<div class="intro__descr txt-wrap">
								<?php echo $slide['text'] ?>
							</div>

							<?php if ( ! empty( $slide['btn_link'] ) && isset( $slide['btn_link'][0]['id'] ) ) {
								$linked_post_id = $slide['btn_link'][0]['id'];
								if ( get_post_status( $linked_post_id ) ) {
									$post_url = get_permalink( $linked_post_id );
									$post_title = get_the_title( $linked_post_id );
									?>
									<a class="intro__more btn btn--fill" href="<?php echo esc_url( $post_url ); ?>" target="_blank">
										Подробнее о прессах
									</a>
									<?php
								}
							} ?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<div class="intro-slider__pagination swiper-pagination"></div>
	</div>
</section>