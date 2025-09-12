<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

function crb_attach_theme_options() {
	Container::make('theme_options', __('Общие элементы сайта'))
		->add_tab( __( 'Счётчики метрики' ), array(
			Field::make('textarea', 'crb_metrics_section', '')
		))

		->add_tab( __( 'Логотип' ), array(
			Field::make('image', 'crb_logo', 'Логотип'),
		))

		->add_tab( __( 'Контакты' ), array(
			Field::make('text', 'crb_phone_one', 'Первый номер телефона'),
			Field::make('text', 'crb_phone_two', 'Второй номер телефона'),
			Field::make('text', 'crb_email', 'Email'),
			Field::make('text', 'crb_full_address', 'Адрес'),
			Field::make('text', 'crb_work_time', 'Время работы'),
			Field::make('text', 'crb_socials_telegram', 'Телеграм'),
			Field::make('text', 'crb_socials_whatsapp', 'WhatsApp'),
		))

		->add_tab( __( 'RuTube' ), array(
			Field::make('text', 'crb_rutube_link', 'Ссылка на канал'),
			Field::make('text', 'crb_rutube_text', 'Текст'),
			Field::make('image', 'crb_rutube_image', 'Изображение'),
		))

		->add_tab( __( 'Ссылка на каталог' ), array(
			Field::make('text', 'crb_link_catalog_text', 'Текст ссылки'),
			Field::make('file', 'crb_link_catalog_link', 'Выберите файл')
				->set_value_type('url') // Сохранять URL файла
		))

		->add_tab( __( 'Подвал сайта' ), array(
			Field::make('text', 'crb_footer_company_name', 'Название компании'),
			Field::make('text', 'crb_footer_copyright', 'Копирайт'),
			Field::make('text', 'crb_footer_policy_text', 'Текст пользовательского соглашения'),
			Field::make('file', 'crb_footer_policy_link', 'Ссылка на пользовательское соглашение')
				->set_value_type('url') // Сохранять URL файла
		));

	Container::make('theme_options', __('Общие секции сайта'))
		->add_tab( __( 'Наши бренды' ), array(
			Field::make( 'color', 'crb_partners_sec_bg_color', 'Цвет фона секции' ),
			Field::make('text', 'crb_partners_sec_title', 'Заголовок секции'),

			Field::make( 'complex', 'crb_section_partners', __('Партнёры'))
				->set_layout('tabbed-horizontal')
				->add_fields( array(
					Field::make( 'text', 'link', 'Ссылка' ),
					Field::make( 'image', 'img', 'Логотип' ),
					Field::make( 'textarea', 'text', 'Текст' ),
				) )
		))

		->add_tab( __( 'Получить предложение!' ), array(
			Field::make( 'color', 'crb_get_offer_sec_bg_color', 'Цвет фона секции' ),
			Field::make('text', 'crb_get_offer_sec_title', 'Заголовок секции'),
			Field::make('textarea', 'crb_get_offer_sec_subtitle', 'Подзаголовок секции'),
			Field::make('textarea', 'crb_get_offer_success', 'Текст согласия на обработку персональных данных'),
		))

    ->add_tab( __( 'Философия GliGA Forging Equipment' ), array(
			Field::make( 'text', 'crb_our_vision_title', __( 'Заголовок секции' ) )
				->set_default_value( 'Философия GliGA Forging Equipment' ),

			Field::make( 'text', 'crb_our_vision_title_vision', __( 'Заголовок "Виденье"' ) )
				->set_default_value( 'Виденье компании:' ),

			Field::make( 'textarea', 'crb_our_vision_text_vision', __( 'Текст "Виденье"' ) )
				->set_help_text( 'Текст для блока "Видение". Можно использовать форматирование' ),

			Field::make( 'text', 'crb_our_vision_mission_title', __( 'Заголовок "Миссия"' ) )
				->set_default_value( 'Миссия компании:' ),

			Field::make( 'textarea', 'crb_our_vision_mission_text', __( 'Текст "Миссия"' ) )
				->set_help_text( 'Текст для блока "Миссия". Можно использовать форматирование' ),

			Field::make( 'complex', 'crb_our_vision_merits', __( 'Список достоинств' ) )
				->set_layout( 'tabbed-horizontal' )
				->setup_labels( array(
					'plural_name'   => 'Достоинства',
					'singular_name' => 'Достоинство',
				))
				->add_fields( array(
					Field::make( 'text', 'text', __( 'Текст достоинства' ) ),
				)),
    ))

		->add_tab( __( 'Награды и достижения' ), array(
			Field::make('text', 'crb_awards_title', 'Заголовок')
				->set_default_value( 'Награды и&nbsp;достижения' ),

			Field::make('textarea', 'crb_awards_descr', 'Описание'),

			Field::make('image', 'crb_awards_image', 'Изображение'),
		))

		->add_tab( __( 'Производство' ), array(
			Field::make('text', 'crb_production_title', 'Заголовок')
				->set_default_value( 'Производство' ),

			Field::make('textarea', 'crb_production_descr', 'Описание'),

			Field::make('image', 'crb_production_image', 'Изображение'),
		))


		;
}
add_action('carbon_fields_register_fields', 'crb_attach_theme_options');