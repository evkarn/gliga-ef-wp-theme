<?php

add_action('init', 'register_equipment_post_type');

// Регистрируем тип записи "Оборудование"
function register_equipment_post_type() {
	register_post_type('equipments', [
		'label' => 'Оборудование',

		'labels' => [
			'name' => 'Оборудование',
			'singular_name' => 'Оборудование',
			'add_new' => 'Добавить Оборудование',
			'add_new_item' => 'Добавить новое Оборудование',
			'edit_item' => 'Редактировать Оборудование',
			'new_item' => 'Новое Оборудование',
			'view_item' => 'Просмотреть Оборудование',
			'search_items' => 'Поиск Оборудования',
			'not_found' => 'Оборудование не найдено',
			'not_found_in_trash' => 'Оборудование в корзине не найдено',
			'menu_name' => 'Оборудование'
		],

		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'equipments'],
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'menu_icon' => 'dashicons-superhero-alt',
	]);
}



add_action('init', 'register_equipment_type_taxonomy', 11);

// Регистрируем таксономию "Типы оборудования"
function register_equipment_type_taxonomy() {
    $labels = [
        'name' => 'Типы оборудования',
        'singular_name' => 'Тип оборудования',
        'search_items' => 'Поиск типов оборудования',
        'all_items' => 'Все типы оборудования',
        'parent_item' => 'Родительский тип',
        'parent_item_colon' => 'Родительский тип:',
        'edit_item' => 'Редактировать тип',
        'update_item' => 'Обновить тип',
        'add_new_item' => 'Добавить новый тип оборудования', // Английский для AJAX
        'new_item_name' => 'Название нового типа оборудования', // Английский для AJAX
        'menu_name' => 'Типы оборудования',
        'popular_items' => 'Популярные типы', // Добавляем недостающие labels
        'separate_items_with_commas' => 'Выделяйте типы запятыми',
        'choose_from_most_used' => 'Выберите один из наиболее часто используемых типов',
    ];

    $args = [
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'equipment-type'],
        'show_in_rest' => true,
    ];

    register_taxonomy('equipment_type', ['equipments'], $args);
}

?>