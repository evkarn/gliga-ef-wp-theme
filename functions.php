<?php
/**
 * Main functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Main
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

require get_template_directory() . '/inc/functions/main-setup.php';

require get_template_directory() . '/inc/functions/main-content-width.php';

require get_template_directory() . '/inc/functions/main-widgets-init.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Validation
require get_template_directory() . '/inc/functions/validation.php';


// Admin styles
require get_template_directory() . '/inc/functions/styles-for-the-admin.php';


// Регистрация меню
require get_template_directory() . '/inc/functions/register-my-menus.php';


// Регистрация отдельного типа записи для прессов и таксономии тип оборудования
require get_template_directory() . '/inc/functions/register-equipment-post-type-and-taxonomy.php';


// Breadcrumbs
require get_template_directory() . '/inc/functions/breadcrumbs.php';


// Enqueue scripts and styles
require get_template_directory() . '/inc/functions/main-scripts.php';


// Carbon Fields
require get_template_directory() . '/inc/carbon-fields/post-meta.php';
require get_template_directory() . '/inc/carbon-fields/term-meta.php';
require get_template_directory() . '/inc/carbon-fields/theme-options.php';
// End. Carbon Fields

// Получение адреса текущей страницы
require get_template_directory() . '/inc/functions/get-current-canonical-url.php';


// Вывод статей в секцию со статьями
require get_template_directory() . '/inc/functions/output-recent-posts.php';

// Показывает название шаблона страницы в правом нижнем углу
require get_template_directory() . '/inc/functions/show-template.php';