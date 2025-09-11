<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
*/

	$address = carbon_get_theme_option( 'crb_full_address' );
	$company_name = carbon_get_theme_option( 'crb_footer_company_name' );
	$copyright = carbon_get_theme_option( 'crb_footer_copyright' );
	$policy_text = carbon_get_theme_option( 'crb_footer_policy_text' );
	$policy_link = carbon_get_theme_option( 'crb_footer_policy_link' );
?>

		<?php get_template_part( 'template-parts/go-back-top' ); ?>

		<footer
			class="footer"
			itemscope
			itemtype="https://schema.org/WPFooter"
			style="background-color: var(--footer-bg);"
		>
			<div class="footer__container container flex-column">
				<div class="footer__row grid">
					<div class="footer__block flex-column-start">
						<?php get_template_part( 'template-parts/logo' ); ?>

						<?php get_template_part( 'template-parts/link-catalog' ); ?>
					</div>

					<div class="footer__block flex-column-start">
						<div
							class="spoilers"
							itemscope
							itemtype="https://schema.org/FAQPage"
						>
							<ul
								class="spoilers__list"
								data-spoilers-list="576,max"
							>
								<li
									class="spoilers__item spoiler"
									data-spoiler
								>
									<button
										class="spoiler__title"
										data-spoiler-title
										tabindex="-1"
										type="button"
									>
										Меню

										<svg
											class="sprite-svg"
											aria-hidden="true"
										>
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite/sprite.svg#angle-down"></use>
										</svg>
									</button>

									<div
										class="spoiler__content spoiler-content"
										data-spoiler-content
									>
										<div class="spoiler__inner">
											<nav
												class="footer__nav nav"
												aria-labelledby="my-footer-menu"
											>
												<h2
													class="h2 visually-hidden"
													id="my-footer-menu"
												>
													Меню в подвале сайта
												</h2>

												<?php wp_nav_menu( array(
													'theme_location'  => 'footer-menu',
													'menu_class'      => 'menu',
													'container'       => false,
													'items_wrap'      => '<ul class="menu" data-menu itemscope itemtype="https://schema.org/SiteNavigationElement">%3$s</ul>',
													'walker'          => new Custom_Menu_Walker(),
													'fallback_cb'     => false,
												) ); ?>
											</nav>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>

					<div class="footer__block flex-column-start">
						<address class="footer__contacts contacts flex-column">
							<span class="footer__company-name">
								<?php if ( $company_name ) { echo $company_name; } ?>
							</span>

							<div class="contacts__row flex">
								<?php get_template_part( 'template-parts/contacts/phone-one' ); ?>

								<?php get_template_part( 'template-parts/contacts/socials' ); ?>
							</div>

							<div class="contacts__row">
								<?php get_template_part( 'template-parts/contacts/email' ); ?>
							</div>

							<div class="contacts__row">
								<span
									class="contacts__address"
									style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/svg/home.svg');"
								>
									<?php if ( $address ) { echo $address; } ?>
								</span>
							</div>
						</address>
					</div>

					<div class="footer__block flex-column">
						<?php get_template_part( 'template-parts/rutube-link-qr' ); ?>
					</div>
				</div>

				<div class="footer__row footer__row--bottom flex-align-center">
					<div class="footer__copyright">
						<meta
							itemprop="copyrightYear"
							content="2023"
						>

						<meta
							itemprop="copyrightHolder"
							content="GliGA Forging Equipment"
						>

						<div>&copy; <span class="footer__year"></span> <?php if ( $copyright ) { echo $copyright; } ?></div>
					</div>

					<a
						class="footer__policy state-accent"
						href="<?php if ( $policy_link ) { echo $policy_link; } ?>"
						target="_blank"
					>
						<?php if ( $policy_text ) { echo $policy_text; } ?>
					</a>
				</div>
			</div>
		</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
