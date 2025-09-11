<?php

function register_my_menu() {
	register_nav_menu('primary-menu', __('Primary Menu'));
	register_nav_menu('footer-menu', __('Footer Menu'));
}
add_action('after_setup_theme', 'register_my_menu');



class Header_Nav_Walker extends Walker_Nav_Menu {
	public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$output .= '<li' . $class_names . '>';

		// Атрибуты ссылки
		$atts = array();
		$atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
		$atts['target'] = !empty($item->target) ? $item->target : '';
		$atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
		$atts['href']   = !empty($item->url) ? $item->url : '';
		$atts['class']  = 'menu-link';

		$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (!empty($value)) {
				$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';

		// Для пункта "Прессы" добавляем подменю из таксономий
		if ($item->title === 'Кузнечное оборудование' && $depth === 0) {
			$presses_submenu = $this->generate_presses_submenu();
			if ($presses_submenu) {
				$item_output .= $presses_submenu;
			}
		}

		$item_output .= $args->after;
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	/**
	 * Генерирует подменю для таксономии equipment_type
	 */
	private function generate_presses_submenu() {
		// Получаем все термины таксономии equipment_type
		$equipment_types = get_terms([
			'taxonomy' => 'equipment_type',
			'hide_empty' => false,
			'orderby' => 'name',
			'order' => 'ASC'
		]);

		if (empty($equipment_types) || is_wp_error($equipment_types)) {
			return '';
		}

		$submenu = '<ul class="sub-menu" data-grid>';

		foreach ($equipment_types as $equipment_type) {
			// Получаем данные из Carbon Fields
			$image_id = carbon_get_term_meta($equipment_type->term_id, 'crb_equipment_type_image');

			// Формируем ссылку на архив термина
			$term_link = get_term_link($equipment_type);

			// Alt текст для изображения
			$image_alt = $equipment_type->name;

			// Описание (используем описание термина или название)
			$name = !empty($equipment_type->name) ? $equipment_type->name : 'Без названия';

			$submenu .= '
			<li class="menu-item">
				<a class="menu-link" href="' . esc_url($term_link) . '">
					<div class="card-nav flex-column-center">';

			// Вывод изображения
			if ($image_id) {
				$submenu .= wp_get_attachment_image(
					$image_id,
					'thumbnail',
					false,
					[
						'class' => 'card-nav__img',
						'width' => '155',
						'height' => '155',
						'alt' => esc_attr($image_alt),
						'decoding' => 'auto',
						'aria-hidden' => 'true'
					]
				);
			} else {
				// Заглушка, если изображение не установлено
				$submenu .= '
				<img
					class="card-nav__img"
					src="' . get_template_directory_uri() . '/assets/images/nav/default-press.webp"
					width="155"
					height="155"
					alt="' . esc_attr($image_alt) . '"
					decoding="auto"
					aria-hidden="true"
				>';
			}

			$submenu .= '
						<span class="card-nav__txt">' . esc_html($name) . '</span>
					</div>
				</a>
			</li>';
		}

		$submenu .= '</ul>';
		return $submenu;
	}
}


// Кастомный Walker класс для меню
class Custom_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="sub-menu">';
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Добавляем data-атрибуты
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="menu-item ' . esc_attr( $class_names ) . '"' : ' class="menu-item"';

        $output .= '<li' . $class_names . ' data-menu-item>';

        // Атрибуты ссылки
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts['class']  = 'menu-link';
        $atts['data-menu-link'] = '';
        $atts['itemprop'] = 'url';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

class Footer_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        // Атрибуты ссылки
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        $atts['itemprop'] = 'url';

        // Добавляем data-атрибут только для ссылок первого уровня
        if ($depth === 0) {
            $atts['data-menu-link'] = '';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}