<?php
function get_current_canonical_url() {
    // Главная страница
    if (is_front_page()) {
			return home_url('/');
    }

    // Отдельные записи и страницы
    if (is_singular()) {
        $url = get_permalink();

        // Многостраничные записи (<!--nextpage-->)
        $page = get_query_var('page');
        if ($page >= 2) {
            $url = trailingslashit($url) . user_trailingslashit($page);
        }

        return $url;
    }

    // Архивы, таксономии и другие страницы
    global $wp;
    $url = home_url($wp->request);

    // Пагинация для архивов
    $paged = get_query_var('paged');
    if ($paged >= 2) {
        $url = home_url($wp->request . '/page/' . $paged);
    }

    return $url;
}