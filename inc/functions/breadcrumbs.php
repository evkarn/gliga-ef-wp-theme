<?php

/**
 * Изменяет хлебные крошки Yoast.
 *
 * Вывести в шаблоне: do_action('pretty_breadcrumb');
 *
 */
class Pretty_Breadcrumbs {

	/**
	 * Какую позицию занимает элемент в цепочке хлебных крошек.
	 *
	 * @var int
	 */
	private $el_position = 0;

	public function __construct() {
		add_action( 'pretty_breadcrumbs', [ $this, 'render' ] );
	}

	/**
	 * Выводит на экран сгенерированные крошки.
	 *
	 * @return void
	 */
	public function render() {
		if ( ! function_exists( 'yoast_breadcrumb' ) ) {
			return;
		}

		// Регистрируем фильтры для изменения дефолтной вёрстки крошек
		add_filter( 'wpseo_breadcrumb_single_link', [ $this, 'modify_yoast_items' ], 10, 2 );
		add_filter( 'wpseo_breadcrumb_output', [ $this, 'modify_yoast_output' ] );
		add_filter( 'wpseo_breadcrumb_output_wrapper', [ $this, 'modify_yoast_wrapper' ] );
		add_filter( 'wpseo_breadcrumb_separator', '__return_empty_string' );

		// Выводим крошки на экран
		yoast_breadcrumb();

		// Отключаем фильтры
		remove_filter( 'wpseo_breadcrumb_single_link', [ $this, 'modify_yoast_items' ] );
		remove_filter( 'wpseo_breadcrumb_output', [ $this, 'modify_yoast_output' ] );
		remove_filter( 'wpseo_breadcrumb_output_wrapper', [ $this, 'modify_yoast_wrapper' ] );
		remove_filter( 'wpseo_breadcrumb_separator', '__return_empty_string' );

		// Обнуляем счётчик
		$this->el_position = 0;
	}

	/**
	 * Изменяет html код li элементов.
	 *
	 * @param string $link_html Дефолтная вёрстка элемента хлебных крошек.
	 * @param array  $link_data Массив данных об элементе хлебных крошек.
	 *
	 * @return string
	 */
	function modify_yoast_items( $link_html, $link_data ) {
		// Шаблон контейнера li
		$li = '<li class="breadcrumbs__item" itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem" %s>%s</li>';

		$sep = '•';

		// Содержимое li в зависимости от позиции элемента
		if ( strpos( $link_html, 'breadcrumb_last' ) === false ) {
			$li_inner = sprintf( '
                <a class="breadcrumbs__link" itemprop="item" href="%s">
                  <span itemprop="name">%s</span>
                </a>
            ', $link_data['url'], $link_data['text'] );
			$li_inner .= '<span class="divider"> • </span>';
			$li_class = '';
		} else {
			$li_inner = sprintf( '<span itemprop="name">%s</span>', $link_data['text'] );
			$li_class = 'data-item-active';
		}

		$li_inner .= sprintf( '<meta itemprop="position" content="%d"/>', ++ $this->el_position );

		// Вкладываем сформированное содержание в li и возвращаем полученный элемент хлебных крошек.
		return sprintf( $li, $li_class, $li_inner );
	}

	/**
	 * Возвращает псевдо wrapper, который в будущем будет вырезан из вёрстки.
	 * Если этого не сделать, то будущие li будут обёртнуты в единый span Yoast'ом.
	 *
	 * @return string
	 */
	function modify_yoast_wrapper() {
		return 'wrapper'; // Будущий "уникальный" тег для вырезки из html
	}

	/**
	 * Изменяет дефолтный html код крошек Yoast.
	 *
	 * @param string $html
	 *
	 * @return string
	 */
	function modify_yoast_output( $html ) {
		// Убираем псевдо wrapper
		$html = str_replace( [ '<wrapper>', '</wrapper>' ], '', $html );

		// Формируем контейнер для li элементов
		$list = '<ol class="breadcrumbs__list list-reset" itemscope="itemscope" itemtype="https://schema.org/BreadcrumbList">%s</ol>';

		// Вставляем в контейнер li элементы
		$html = sprintf( $list, $html );

		return $html;
	}
}

new Pretty_Breadcrumbs();

// functions.php
add_filter( 'wpseo_schema_graph_pieces', 'remove_breadcrumbs_from_schema', 11, 2 );
add_filter( 'wpseo_schema_webpage', 'remove_breadcrumbs_property_from_webpage', 11, 1 );

/**
 * Removes the breadcrumb graph pieces from the schema collector.
 *
 * @param array  $pieces  The current graph pieces.
 * @param string $context The current context.
 *
 * @return array The remaining graph pieces.
*/
function remove_breadcrumbs_from_schema( $pieces, $context ) {
    return \array_filter( $pieces, function( $piece ) {
        return ! $piece instanceof \Yoast\WP\SEO\Generators\Schema\Breadcrumb;
    } );
}

/**
 * Removes the breadcrumb property from the WebPage piece.
 *
 * @param array $data The WebPage's properties.
 *
 * @return array The modified WebPage properties.
*/
function remove_breadcrumbs_property_from_webpage( $data ) {
    if (array_key_exists('breadcrumb', $data)) {
        unset($data['breadcrumb']);
    }
    return $data;
}