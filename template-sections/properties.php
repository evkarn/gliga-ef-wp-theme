<?php
	$title = carbon_get_the_post_meta( 'crb_properties_title' );
	$parameters = carbon_get_the_post_meta( 'crb_properties_parameters' );
	$units = carbon_get_the_post_meta( 'crb_properties_units' );
	$models = carbon_get_the_post_meta('crb_properties_models_info');
	$notes = carbon_get_the_post_meta('crb_properties_note');
?>
<section class="section properties">
	<div class="container properties__container">
		<header class="section__header">
			<h2 class="h2 section__title title-decor properties__title">
				<?php echo ! empty( $title ) ? $title : 'Технические характеристики'; ?>
			</h2>
		</header>

		<div class="properties__main">
			<div class="properties__table table">
				<div class="table__column table__column--first flex-column">
					<div class="table__th flex-column">
						Модель
					</div>

					<div class="table__content-wrap grid">
						<div class="table__content flex-column">
							<?php if ( ! empty( $parameters ) ): ?>
								<?php foreach ( $parameters as $parameter ): ?>
								<div class="table__td">
									<?php echo $parameter['name'] ?>
								</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>

						<div class="table__content flex-column">
							<?php if ( ! empty( $units ) ): ?>
								<?php foreach ( $units as $unit ): ?>
								<div class="table__td">
									<?php echo $unit['name'] ?>
								</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<?php
					if (!empty($models)) :
				?>
				<div class="table__models flex" data-simplebar>
					<?php foreach ($models as $model) : ?>
						<div class="table__column flex-column">
							<!-- Заголовок модели -->
							<div class="table__th flex-column">
								<?php echo esc_html($model['model_name']); ?>
							</div>

							<!-- Характеристики -->
							<?php foreach ($model['model_specifications'] as $index => $spec) : ?>
								<div class="table__td">
									<?php echo esc_html($spec['spec_value']); ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>

		<footer class="properties__footer">
			<?php if ( $notes ) { echo $notes; } ?>
		</footer>
	</div>
</section>