<?php
// Настройки для секции новостей
function theme_customize_register($wp_customize) {
    // Секция для настроек новостей
    $wp_customize->add_section('news_section_settings', array(
        'title'    => __('Настройки секции новостей', 'text-domain'),
        'priority' => 120,
    ));

    // Заголовок секции
    $wp_customize->add_setting('news_section_title', array(
        'default'           => 'Новости и статьи',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('news_section_title', array(
        'label'    => __('Заголовок секции', 'text-domain'),
        'section'  => 'news_section_settings',
        'type'     => 'text',
    ));

    // Количество постов
    $wp_customize->add_setting('news_posts_count', array(
        'default'           => 8,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('news_posts_count', array(
        'label'    => __('Количество постов', 'text-domain'),
        'section'  => 'news_section_settings',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 20,
            'step' => 1,
        ),
    ));

    // Текст кнопки
    $wp_customize->add_setting('news_button_text', array(
        'default'           => 'Посмотреть все',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('news_button_text', array(
        'label'    => __('Текст кнопки', 'text-domain'),
        'section'  => 'news_section_settings',
        'type'     => 'text',
    ));

    // URL кнопки
    $wp_customize->add_setting('news_button_url', array(
        'default'           => '/news',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('news_button_url', array(
        'label'    => __('URL кнопки', 'text-domain'),
        'section'  => 'news_section_settings',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'theme_customize_register');


// Функция для получения изображения поста
function get_post_image($post_id, $size = 'Full', $default_image = '') {
    if (has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail($post_id, $size);
    }

    if ($default_image) {
        return '<img class="card__img" src="' . esc_url($default_image) . '" alt="' . get_the_title($post_id) . '" width="340" height="184" loading="lazy" decoding="auto">';
    }

    // Заглушка по умолчанию
    return '<img class="card__img" src="https://preview.evkarn.ru/gliga-fe-wp/wp-content/uploads/2025/09/home.webp" alt="' . get_the_title($post_id) . '" width="340" height="184" loading="lazy" decoding="auto">';
}