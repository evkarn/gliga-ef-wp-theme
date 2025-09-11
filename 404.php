<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Main
 */

get_header();
?>

		<main id="primary" class="main">
			<section class="error-404 not-found">
				<div class="container error-404__container flex-column">
					<header class="page-header">
						<h1 class="page-title h1"><?php esc_html_e( 'Упс! Эту страницу невозможно найти.', 'main' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content flex-column">
						<img class="error-404__img" src="<?php echo get_template_directory_uri(); ?>/assets/svg/404.svg" width="500" height="167" alt="Цифра 404" loading="lazy" decoding="auto" aria-hidden="true">

						<p><?php esc_html_e( 'Похоже, здесь ничего не найдено. Может, попробовать одну из ссылок ниже или выполнить поиск?', 'main' ); ?></p>

						<p>
							Перейти на главную страницу сайта: <a class="state-accent under" href="<?php echo esc_url(home_url('/')); ?>">Главная</a>
						</p>

						<?php
						get_search_form();

						the_widget( 'WP_Widget_Recent_Posts' );
						?>

						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Наиболее часто используемые категории', 'main' ); ?></h2>
							<ul>
								<?php
								wp_list_categories(
									array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									)
								);
								?>
							</ul>
						</div><!-- .widget -->

						<?php
						/* translators: %1$s: smiley */
						$main_archive_content = '<p>' . sprintf( esc_html__( 'Попробуйте заглянуть в ежемесячные архивы. %1$s', 'main' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$main_archive_content" );

						the_widget( 'WP_Widget_Tag_Cloud' );
						?>
					</div><!-- .page-content -->
				</div>
			</section><!-- .error-404 -->
		</main><!-- #main -->

<?php
get_footer();
