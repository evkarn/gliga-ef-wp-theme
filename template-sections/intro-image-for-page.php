<?php
$current_page_id = intval(get_queried_object_id());

// Получаем ID изображения
$image_id = carbon_get_term_meta($current_page_id, 'crb_equipment_type_image_page');

// Получаем URL изображения
$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';

$page_title = get_the_title();

// Получаем alt текст изображения
$image_alt = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : $page_title;

// Получаем другие данные изображения (опционально)
$image_title = $image_id ? get_the_title($image_id) : '';
$image_caption = $image_id ? wp_get_attachment_caption($image_id) : '';
?>
<section class="section intro-img">
	<div class="intro-img__container container">
		<h2 class="h2 visually-hidden">
			Заглавное изображение для категории
		</h2>

		<img class="intro-img__image" src="<?php if ( $image_url ) { echo esc_url($image_url); } ?>" width="1456" height="370" alt="<?php if ( $image_alt ) { echo esc_attr($image_alt); } ?>" decoding="auto">
	</div>
</section>