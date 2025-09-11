<?php
	$bg_color = carbon_get_theme_option( 'crb_partners_sec_bg_color' );
	$title = carbon_get_theme_option( 'crb_partners_sec_title' );
	$partners = carbon_get_theme_option( 'crb_section_partners' );
?>
<section
	class="section partners"
	style="background-color: <?php if ( $bg_color ) { echo $bg_color; } ?>;"
>
	<div class="container partners__container">
		<header class="section__header">
			<h2 class="h2 section__title partners__sec-title">
				<?php if ( $title ) { echo $title; } ?>
			</h2>
		</header>

		<div class="partners__main">
			<?php if ( ! empty( $partners ) ): ?>
			<ul class="partners__list">
				<?php foreach ( $partners as $partner ): ?>
				<li class="partners__item">
					<a
						class="partners__link"
						href="<?php echo $partner['link'] ?>"
					>
						<?php if ( $partner['img'] ) { echo wp_get_attachment_image( $partner['img'], 'full', false, array( 'class' => 'partners__logo', 'width' => '140',
							'height' => '60' ) ); } ?>

						<div class="partners__descr txt-wrap">
							<p class="partners__txt">
								<span>WYX</span> — винтовые прессы, сервогидравлические прессы, горизонтально-ковочные машины.
								Реализовано более
								150-и автоматических кузнечно-прессовых линий
							</p>
						</div>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
	</div>
</section>