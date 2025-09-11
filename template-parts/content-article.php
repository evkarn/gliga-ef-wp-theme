<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-sec__card card card--news flex-column'); ?>>
	<a
		class="card__link flex-column"
		href="<?php echo esc_url( get_permalink() ); ?> )"
	>
		<header class="card__header">
			<div class="card__img-wrap">
				<?php if (has_post_thumbnail()) {
					$thumbnail_id = get_post_thumbnail_id();
					$thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
					$thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
					// Если alt пустой, используем заголовок статьи как fallback
					$alt_text = !empty($thumbnail_alt) ? $thumbnail_alt : get_the_title();
				} ?>
				<img
					class="card__img"
					src="<?php echo esc_url($thumbnail_url); ?>"
					width="340"
					height="270"
					alt="<?php echo esc_attr($alt_text); ?>"
					loading="lazy"
					decoding="auto"
				>
			</div>
		</header>

		<div class="card__main flex-column">
			<h3 class="h3 visually-hidden">
				<?php the_title(); ?>
			</h3>

			<div class="card__descr txt-wrap flex-column">
				<?php
					$content = get_the_content( sprintf( wp_kses(
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'GliGA Forging Equipment' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
					), wp_kses_post( get_the_title() ) ) );

					$trimmed_content = wp_trim_words( $content, 34, '...' );

					echo wp_kses_post( $trimmed_content );
				?>
			</div>
		</div>

		<div class="card__footer">
			<time class="card__date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
				<?php echo get_the_date('d.m.Y'); ?>
			</time>

			<span class="card__more flex-center">
				&rarr;
			</span>
		</div>
	</a>
</article>