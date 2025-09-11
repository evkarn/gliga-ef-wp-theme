<?php
	$title = carbon_get_theme_option( 'crb_history_title' );

	$left_list = carbon_get_theme_option( 'crb_history_left_list' );

	$right_list = carbon_get_theme_option( 'crb_history_right_list' );
?>
<section class="section history">
	<div class="container history__container">
		<header class="section__header">
			<h2 class="h2 section__title history__main-title title-decor">
				<?php if ( $title ) { echo $title; } ?>
			</h2>
		</header>

		<div class="history__main">
			<?php if ( ! empty( $left_list ) ): ?>
			<ul class="history__list flex-column">
				<?php foreach ( $left_list as $item ): ?>
				<li class="history__item flex">
					<span class="history__year"><?php echo $item['year'] ?></span>

					<span class="history__txt"><?php echo $item['text'] ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>

			<?php if ( ! empty( $right_list ) ): ?>
			<ul class="history__list flex-column">
				<?php foreach ( $right_list as $item ): ?>
				<li class="history__item flex">
					<span class="history__year"><?php echo $item['year'] ?></span>

					<span class="history__txt"><?php echo $item['text'] ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
	</div>
</section>