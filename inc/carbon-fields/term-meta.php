<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Добавляем поле давления для таксономии "Типы прессов"
add_action('carbon_fields_register_fields', 'add_info_to_equipment_type');

function add_info_to_equipment_type() {
	Container::make( 'term_meta', __('Мета данные для <head>') )
		->where('term_taxonomy', '=', 'equipment_type')

		->add_fields( array(
			Field::make( 'text', 'crb_page_meta_title', 'Заголовок страницы' ),
			Field::make( 'textarea', 'crb_page_meta_description', 'Описание страницы' ),
			Field::make( 'text', 'crb_page_meta_keywords', 'Ключи для meta keywords' ),
			Field::make( 'image', 'crb_page_meta_og_image', __( 'Og-image для страницы' ))
				->set_value_type( 'url' ),
		) );

	Container::make('term_meta', __('Дополнительная информация'))
		->where('term_taxonomy', '=', 'equipment_type')

		->add_fields([
				Field::make('text', 'crb_equipment_type_pressure', __('Давление'))
					->set_help_text('Укажите максимальное давление пресса'),

				Field::make('image', 'crb_equipment_type_image', __('Изображение'))
					->set_help_text( 'Для карточек на главной странице, 334x258px или 668x518px' ),

				Field::make('textarea', 'crb_equipment_type_descr', __('Описание категории для секции ')),

				Field::make('image', 'crb_equipment_type_image_page', __('Изображение'))
					->set_help_text( 'Для вывода на странице категории, 1456x370px или 2912x1016px' ),
		]);
}
