<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

function crb_attach_post_meta() {
	Container::make( 'post_meta', __('Мета данные для <head>') )
		->where('post_type', '=', 'post')
		->or_where('post_type', '=', 'page')
		->or_where('post_type', '=', 'equipments')

		->add_fields( array(
			Field::make( 'text', 'crb_page_meta_title', 'Заголовок страницы' ),
			Field::make( 'textarea', 'crb_page_meta_description', 'Описание страницы' ),
			Field::make( 'text', 'crb_page_meta_keywords', 'Ключи для meta keywords' ),
			Field::make( 'image', 'crb_page_meta_og_image', __( 'Og-image для страницы' ))
				->set_value_type( 'url' ),
		) );

	Container::make( 'post_meta', __('Вводная секция') )
		->where('post_template', '=', 'tpl-home.php')

		->add_tab( __( 'Заголовок' ), array(
			Field::make( 'text', 'crb_intro_home_title', __( 'Заголовок секции (не виден, но нужен)' ) ),
		))

		->add_tab( __( 'Слайдер' ), array(
			Field::make('complex', 'crb_intro_home_slides', 'Слайды')
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('select', 'media_type', 'Тип медиа')
						->add_options(array(
							'image' => 'Изображение',
							'video' => 'Видео',
						))
						->set_default_value('image'),

					Field::make('image', 'image', 'Изображение')
						->set_conditional_logic(array(
							array(
								'field' => 'media_type',
								'value' => 'image',
							)
						)),

					Field::make('text', 'video', 'URL видео')
						->set_conditional_logic(array(
							array(
								'field' => 'media_type',
								'value' => 'video',
							)
						)),

					Field::make('text', 'format', 'Формат видео (mp4, webm)')
						->set_default_value('mp4')
						->set_conditional_logic(array(
							array(
								'field' => 'media_type',
								'value' => 'video',
							)
						)),

					Field::make('image', 'poster', 'Постер видео')
						->set_conditional_logic(array(
							array(
								'field' => 'media_type',
								'value' => 'video',
							)
						)),

					Field::make('text', 'title', 'Заголовок слайда'),

					Field::make('textarea', 'text', 'Текст слайда'),

					Field::make('association', 'btn_link', 'Ссылка на страницу для кнопки')
						->set_types(array(
							array(
								'type' => 'post',
								'post_type' => 'page',
							)
						))
						->set_max(1),
				]),
			));

	Container::make( 'post_meta', __('О компании') )
		->where('post_template', '=', 'tpl-home.php')
		->or_where('post_template', '=', 'tpl-about.php')

		->add_fields( array(
			Field::make( 'text', 'crb_about_sec_title', __( 'Заголовок секции' ) )
				->set_default_value('О&nbsp;компании'),

			Field::make( 'textarea', 'crb_about_sec_description', __( 'Описание секции' ) ),

			Field::make('complex', 'crb_about_sec_info_numbers', 'Факты о компании')
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'title', 'Заголовок'),
					Field::make('text', 'after_symbol', 'Символ после заголовка')
						->set_default_value('+'),
					Field::make('text', 'text', 'Текст'),
				]),

			Field::make('image', 'crb_about_sec_image', 'Изображение'),

			Field::make('association', 'crb_about_sec_btn_link', 'Ссылка на страницу для кнопки')
				->set_types(array(
					array(
						'type' => 'post',
						'post_type' => 'page',
					)
				))
				->set_max(1),

			Field::make( 'text', 'crb_about_sec_btn_text', __( 'Текст кнопки' ) ),
		));

	Container::make( 'post_meta', __('Комплексные решения для кузнечно-прессовых цехов') )
		->where('post_template', '=', 'tpl-home.php')
		->add_fields( array(
			Field::make('text', 'crb_catalog_category_categories_title', 'Заголовок для секции')
				->set_default_value('Комплексные решения для кузнечно-прессовых цехов'),

			Field::make('textarea', 'crb_catalog_category_categories_descr', 'Описание для секции'),
		));

	Container::make( 'post_meta', __('Контактные данные') )
		->where('post_template', '=', 'tpl-contacts.php')

		->add_fields([
			Field::make('text', 'crb_contacts_sec_title', 'Заголовок секции (не виден, но нужен)'),
			Field::make('textarea', 'crb_contacts_sec_map', 'Код карты'),
		]);

	Container::make( 'post_meta', __('Информация о продукте') )
		->where('post_template', '=', 'tpl-equipment-page.php')

		->add_fields( array(
			Field::make( 'text', 'crb_intro_page_name', __( 'Название (модель)' ) ),

			Field::make( 'text', 'crb_intro_page_title', __( 'Описание оборудования' ) ),

			Field::make( 'text', 'crb_intro_page_info', __( 'Доп. информация' ) ),

			Field::make( 'image', 'crb_intro_page_image', __( 'Изображение (590х615 или 1180х1230)' ) )
				->set_value_type( 'url' ),
		) );

	Container::make('post_meta', 'Таблица характеристик')
		->where('post_template', '=', 'tpl-equipment-page.php')

		->add_fields([
			Field::make('text', 'crb_properties_title', 'Заголовок секции')
				->set_default_value('Технические характеристики'),

			// Заголовки характеристик
			Field::make('complex', 'crb_properties_parameters', 'Заголовки характеристик')
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'name', 'Название характеристики'),
				])
				->set_width( 50 ),

			// Заголовки характеристик
			Field::make('complex', 'crb_properties_units', 'Заголовки ед. изм.')
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'name', 'Единица измерения'),
				])
				->set_width( 50 ),

			// Модели с характеристиками
			Field::make('complex', 'crb_properties_models_info', 'Модели оборудования')
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'model_name', 'Название модели'),

					Field::make('complex', 'model_specifications', 'Характеристики')
						->set_layout('tabbed-horizontal')
						->add_fields([
							Field::make('text', 'spec_value', 'Значение'),
						])
				]),

			Field::make( 'textarea', 'crb_properties_note', __( 'Примечания' ) )
				->set_default_value('<span class="red">*</span> Характеристики приведены только для справки, фактические параметры будут разработаны в соответствии с потребностями.'),
		]);

	Container::make('post_meta', 'Описание оборудования')
    ->where('post_template', '=', 'tpl-equipment-page.php')

    ->add_fields(array(
			Field::make('text', 'crb_descr_series_title', 'Заголовок секции')
				->set_default_value('Описание серии '),


				Field::make('complex', 'crb_descr_series_cards', 'Элементы описания')
				->add_fields(array(

					Field::make('textarea', 'descr', 'Текст перед элементами описания'),

					Field::make('complex', 'list', 'Список элементов')
						->add_fields(array(
							Field::make('textarea', 'title', 'Текст элемента')
						))
						->set_layout('tabbed-horizontal')
				))
				->set_layout('tabbed-horizontal'),

			Field::make('textarea', 'crb_descr_series_accent_el', 'Выделенные текст после списка'),
    ));

	Container::make('post_meta', 'Примеры деталей')
		->where('post_template', '=', 'tpl-equipment-page.php')

		->add_fields(array(
			Field::make('text', 'crb_case_details_title', 'Заголовок секции')
				->set_default_value('Примеры деталей'),

			Field::make('complex', 'crb_case_details_items_list', 'Список элементов')
				->add_fields(array(
					Field::make('image', 'img', 'Изображение элемента'),

					Field::make('text', 'title', 'Заголовок элемента')
				))
				->set_layout('tabbed-horizontal')
		));
}
add_action('carbon_fields_register_fields', 'crb_attach_post_meta');