<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">

 */

	$current_page_id = intval(get_queried_object_id());

	$title = carbon_get_term_meta($current_page_id, 'crb_page_meta_title');
	$descr = carbon_get_term_meta($current_page_id, 'crb_page_meta_description');
	$keywords = carbon_get_term_meta($current_page_id, 'crb_page_meta_keywords');
	$og_image = carbon_get_term_meta($current_page_id, 'crb_page_meta_og_image');

	$phone_one = carbon_get_theme_option( 'crb_phone_one' );

	$site_name = get_bloginfo('name');
	$page_title = $title ? esc_html($title) . ' | ' : '';
?>
<!doctype html>
<html
	<?php language_attributes(); ?>
	itemscope="itemscope"
	xmlns="http://www.w3.org/1999/xhtml"
	itemtype="https://schema.org/WebSite"
>
<head
	itemscope
	itemtype="https://schema.org/WPHeader"
>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<link
		rel="canonical"
		href="<?php echo esc_url(get_current_canonical_url()); ?>"
	>

	<meta
		http-equiv="X-UA-Compatible"
		content="ie=edge"
	>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<meta
		name="keywords"
		content="<?php if ($keywords) {echo $keywords;} ?>"
	>

	<!-- Template Basic Images Start -->
	<link
		rel="icon"
		type="image/png"
		href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-96x96.png"
		sizes="96x96"
	>

	<link
		rel="icon"
		type="image/svg+xml"
		href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.svg"
	>

	<link
		rel="shortcut icon"
		href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.ico"
	>

	<link
		rel="apple-touch-icon"
		sizes="180x180"
		href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-touch-icon.png"
	>

	<meta
		name="apple-mobile-web-app-title"
		content="https://gliga.press/"
	>

	<link
		rel="manifest"
		href="<?php echo get_template_directory_uri(); ?>/assets/favicon/site.webmanifest"
	>
	<!-- /Template Basic Images End -->


	<!--Open Graph-->
	<meta
		property="og:site_name"
		content="<?php bloginfo('name'); ?>"
	>

	<meta
		property="og:url"
		content="https://gliga.press/"
	>

	<meta
		property="og:type"
		content="website"
	>

	<meta
		property="og:title"
		content="<?php if (is_front_page()) { echo $site_name; } else { echo $page_title . $site_name; }?>"
	>

	<meta
		property="og:description"
		content="<?php if ($descr) {echo $descr;} ?>"
	>

	<meta
		property="og:image"
		content="<?php if (!empty($og_image)) { echo $og_image; } else { echo 'https://preview.evkarn.ru/gliga-fe-wp/wp-content/uploads/2025/09/home.webp'; } ?>"
	>

	<meta
		property="og:locale"
		content="ru_Ru"
	>

	<meta
		name="twitter:card"
		content="summary_large_image"
	>

	<meta
		name="twitter:title"
		content="<?php if (is_front_page()) { echo $site_name; } else { echo $page_title . $site_name; }?>"
	>

	<meta
		name="twitter:description"
		content="<?php if ($descr) {echo $descr;} ?>"
	>

	<meta
		name="twitter:site"
		content="https://gliga.press/"
	>

	<meta
		name="twitter:image"
		content="<?php if (!empty($og_image)) { echo $og_image; } else { echo 'https://preview.evkarn.ru/gliga-fe-wp/wp-content/uploads/2025/09/home.webp'; } ?>"
	>
	<!--/Open Graph-->


	<!-- Schema-org -->
	<meta
		itemprop="name"
		content="<?php bloginfo('name'); ?>"
	>

	<meta
		itemprop="description"
		content="<?php if ($descr) {echo $descr;} ?>"
	>

	<meta
		itemprop="image"
		content="<?php if (!empty($og_image)) { echo $og_image; } else { echo 'https://preview.evkarn.ru/gliga-fe-wp/wp-content/uploads/2025/09/home.webp'; } ?>"
	>
	<!-- /Schema-org -->


	<link
		rel="preload"
		href="<?php echo get_template_directory_uri(); ?>/assets/fonts/Roboto-VariableFont.woff2"
		as="font"
		type="font/woff2"
		crossorigin
	>

	<link
		rel="preload"
		href="<?php echo get_template_directory_uri(); ?>/assets/fonts/RobotoCondensed-VariableFont.woff2"
		as="font"
		type="font/woff2"
		crossorigin
	>

	<?php wp_head(); ?>
</head>

<body
	<?php body_class('body'); ?>
	itemscope
	itemtype="https://schema.org/WebPage"
>
<?php wp_body_open(); ?>
<?php get_template_part('template-parts/counters'); ?>

	<div class="page-wrap">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'GliGA Forging Equipment' ); ?></a>

		<header class="header">
			<div class="header__container container flex">
				<div class="header__column header__column--left flex-align-center">
					<?php get_template_part( 'template-parts/logo' ); ?>
				</div>

				<div class="header__column header__column--right flex-align-center">
					<nav
						class="header__nav nav"
						aria-labelledby="my-header-menu"
						data-nav
					>
						<h2
							class="h2 visually-hidden"
							id="my-header-menu"
						>
							Меню в шапке сайта
						</h2>

						<?php
							wp_nav_menu(array(
								'theme_location' => 'primary-menu',
								'container'      => false,
								'items_wrap'     => '<ul class="menu" data-menu itemscope itemtype="https://schema.org/SiteNavigationElement">%3$s</ul>',
								'walker'         => new Header_Nav_Walker(),
								'fallback_cb'    => false
							));
						?>
					</nav>

					<address class="header__contacts contacts flex-column">
						<div class="contacts__row flex">
							<?php get_template_part('template-parts/contacts/phone-one'); ?>

							<?php get_template_part('template-parts/contacts/socials'); ?>
						</div>

						<div class="contacts__row">
							<?php get_template_part('template-parts/contacts/email'); ?>
						</div>
					</address>

					<button
						class="burger btn-res"
						data-burger
						aria-label="Открыть меню"
						aria-expanded="false"
					>
						<span class="burger__line">Линия бургера</span>
					</button>
				</div>
			</div>
		</header>
