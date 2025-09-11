<?php

// Убирает contain-intrinsic-size: 3000px 1500px из <head></head>, так как это вызывает ошибку валидации
remove_action( 'wp_head', 'wp_print_auto_sizes_contain_css_fix', 1 );


// Убираем трейлинг слэши
add_filter('wp_kses_allowed_html', function($tags) {
	foreach (['img', 'br', 'hr', 'input', 'meta', 'link'] as $tag) {
		if (isset($tags[$tag])) {
			unset($tags[$tag]['slash']);
		}
	}
	return $tags;
});