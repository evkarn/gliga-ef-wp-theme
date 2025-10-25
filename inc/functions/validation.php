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

function remove_script_type_attribute($tag, $handle) {
	// Убираем type="text/javascript" и type='text/javascript'
	$tag = preg_replace("/type=['\"]text\/javascript['\"]/", '', $tag);

	// Убираем type="script" и type='script'
	$tag = preg_replace("/type=['\"]script['\"]/", '', $tag);

	// Убираем type="module" и type='module' (если нужно)
	// $tag = preg_replace("/type=['\"]module['\"]/", '', $tag);

	return $tag;
}
add_filter('script_loader_tag', 'remove_script_type_attribute', 10, 2);