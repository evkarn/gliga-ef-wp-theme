import Swiper from 'swiper';
import { Pagination, Keyboard, A11y, Navigation } from 'swiper/modules';

import 'simplebar';
import ResizeObserver from 'resize-observer-polyfill';

import justValidate from 'just-validate';

import inputmask from 'inputmask';

function getScrollWidth() {
	'use strict';

	const docEl = document.documentElement;

	const docBody = document.body;

	const scrollbarWidth = window.innerWidth - docBody.clientWidth;

	docEl.style.setProperty('--scroll-width', `${scrollbarWidth}px`);

	return scrollbarWidth;
}

function trackElementHeight(selector, cssVarName) {
	'use strict';

	// 1. Функция обновления высоты
	function updateHeight() {
		const element = document.querySelector(selector);
		if (!element) return;

		const height = element.offsetHeight;
		document.documentElement.style.setProperty(
			`--${cssVarName}`,
			`${height}px`,
		);
	}

	// 2. Обработчик ресайза с debounce
	let resizeTimer;
	function handleResize() {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(updateHeight, 100);
	}

	// 3. Инициализация
	updateHeight(); // Сразу обновляем
	window.addEventListener('resize', handleResize);

	// 4. Возвращаем функцию для остановки
	return function () {
		window.removeEventListener('resize', handleResize);
		clearTimeout(resizeTimer);
	};
}

document.addEventListener('DOMContentLoaded', () => {
	window.ResizeObserver = ResizeObserver;

	getScrollWidth();

	trackElementHeight('.header', 'header-height');

	function disableScroll() {
		const html = document.documentElement;

		const body = document.body;

		const documentRoot = document.querySelector(':root');

		let pagePosition = window.scrollY;

		body.classList.add('stop-scroll');

		body.dataset.position = pagePosition;

		documentRoot.style.setProperty('--top-position', `-${pagePosition}px`);

		html.style.scrollBehavior = 'unset';
	}

	function enableScroll() {
		const html = document.documentElement;

		const body = document.body;

		const documentRoot = document.querySelector(':root');

		let pagePosition = parseInt(body.dataset.position, 10);

		body.classList.remove('stop-scroll');

		window.scroll({
			top: pagePosition,

			left: 0,
		});

		body.removeAttribute('data-position');

		documentRoot.style.setProperty('--top-position', 'auto');

		html.style.scrollBehavior = '';
	}

	function slideDown(target, duration) {
		target.style.removeProperty('display');

		let display = window.getComputedStyle(target).display;

		if (display === 'none') display = 'grid';

		target.style.display = display;

		let height = target.offsetHeight;

		target.style.overflow = 'hidden';

		target.style.height = 0;

		target.style.paddingTop = 0;

		target.style.paddingBottom = 0;

		target.style.marginTop = 0;

		target.style.marginBottom = 0;

		target.offsetHeight;

		target.style.boxSizing = 'border-box';

		target.style.transitionProperty = 'height, margin, padding';

		target.style.transitionDuration = duration + 'ms';

		target.style.height = height + 'px';

		target.style.border = 'none';

		target.style.removeProperty('padding-top');

		target.style.removeProperty('padding-bottom');

		target.style.removeProperty('margin-top');

		target.style.removeProperty('margin-bottom');

		target.style.removeProperty('border');

		window.setTimeout(() => {
			target.style.removeProperty('height');

			target.style.removeProperty('overflow');

			target.style.removeProperty('transition-duration');

			target.style.removeProperty('transition-property');

			target.style.removeProperty('border');
		}, duration);
	}

	function slideUp(target, duration) {
		target.style.transitionProperty = 'height, margin, padding';
		target.style.transitionDuration = duration + 'ms';
		target.style.boxSizing = 'border-box';
		target.style.height = target.offsetHeight + 'px';
		target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		target.style.border = 'none';

		window.setTimeout(() => {
			target.style.display = 'none';
			target.style.removeProperty('height');
			target.style.removeProperty('padding-top');
			target.style.removeProperty('padding-bottom');
			target.style.removeProperty('margin-top');
			target.style.removeProperty('margin-bottom');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
			target.style.removeProperty('border');
		}, duration);
	}

	function slideToggle(target, duration) {
		if (window.getComputedStyle(target).display === 'none') {
			return slideDown(target, duration);
		} else {
			return slideUp(target, duration);
		}
	}

	(function burger() {
		'use strict';

		const burger = document?.querySelector('[data-burger]');

		const nav = document?.querySelector('[data-nav]');
		const navItems = document?.querySelectorAll('[data-nav-item]');

		const fixedEls = document?.querySelectorAll('[data-fixed');

		if (burger && nav) {
			burger.addEventListener('click', () => {
				burger.classList.toggle('burger--is-active');

				nav.classList.toggle('nav--is-visible');

				fixedEls.forEach(function (el) {
					el.classList.toggle('not-leap');
				});

				if (burger.getAttribute('aria-expanded') === 'false') {
					burger.setAttribute('aria-expanded', 'true');

					burger.setAttribute('aria-pressed', 'true');

					burger.setAttribute('aria-label', 'Закрыть меню');

					disableScroll();
				} else {
					burger.setAttribute('aria-expanded', 'false');

					burger.setAttribute('aria-pressed', 'false');

					burger.setAttribute('aria-label', 'Открыть меню');

					enableScroll();
				}
			});
		}

		if (navItems) {
			navItems.forEach((el) => {
				el.addEventListener('click', () => {
					enableScroll();

					if (burger) {
						burger.setAttribute('aria-expanded', 'false');

						burger.setAttribute('aria-pressed', 'false');

						burger.setAttribute('aria-label', 'Открыть меню');

						burger.classList.remove('burger--is-active');
					}

					if (nav) {
						nav.classList.remove('nav--is-active');
					}
				});
			});
		}
	})();

	(function initSwipers() {
		'use strict';

		const swiperIntro = document?.querySelector('.intro-slider');

		if (swiperIntro) {
			const swiper = new Swiper(swiperIntro, {
				modules: [Pagination, Keyboard, A11y],

				loop: true,

				pagination: {
					el: '.intro-slider__pagination',
					clickable: true,
				},

				keyboard: {
					enabled: true,
					onlyInViewport: true,
					pageUpDown: true,
				},

				a11y: {
					enabled: true,
					containerMessage: 'Контейнер слайдера',
					containerRoleDescriptionMessage: 'Внешний контейнер слайдера',
					firstSlideMessage: 'Первый слайд',
					lastSlideMessage: 'Последний слайд',
					nextSlideMessage: 'Кнопка переключения на следующий слайд',
					prevSlideMessage: 'Кнопка переключения на предыдущий слайд',
					paginationBulletMessage: 'Буллит переключения слайда в пагинации',
				},
			});
		}
	})();

	(function readProgressLine() {
		'use strict';

		// Добавляем в body блок для линии прогресса прокрутки
		let lineAppend = document.createElement('div');

		lineAppend.className = 'progress-line';

		lineAppend.innerHTML = '<div class="progress-line__item"></div>';

		document.body.append(lineAppend);

		// Получаем внутренний элемент оболочки линии прогресса прокрутки
		const line = document.querySelector('.progress-line__item');

		function progressAnimation() {
			let scrollTop = window.scrollY;

			let windowHeight = window.innerHeight;

			let siteHeight = document.documentElement.scrollHeight;

			let percentageProgress = Math.floor(
				(scrollTop / (siteHeight - windowHeight)) * 100,
			);

			line.style.width = `${percentageProgress}%`;
		}

		progressAnimation();

		window.addEventListener('scroll', () => {
			progressAnimation();
		});
	})();

	function spoilers(durationSpeed) {
		'use strict';

		// Собираем все элементы с атрибутом data-spoilers-list
		const spoilersArray = document?.querySelectorAll('[data-spoilers-list]');

		// Проверяем есть ли они
		if (spoilersArray.length > 0) {
			// Получение обычных спойлеров
			const spoilersRegular = Array.from(spoilersArray).filter(
				function (item, index, self) {
					return !item.dataset.spoilersList.split(',')[0];
				},
			);

			// Инициализация обычных спойлеров
			if (spoilersRegular.length > 0) {
				initSpoilers(spoilersRegular);
			}

			// Получение спойлеров с медиазапросами
			const spoilersMedia = Array.from(spoilersArray).filter(
				function (item, index, self) {
					return item.dataset.spoilersList.split(',')[0];
				},
			);

			// Инициализация спойлеров с медиазапросами
			if (spoilersMedia.length > 0) {
				const breakpointsArray = [];

				spoilersMedia.forEach((item) => {
					const params = item.dataset.spoilersList;

					const breakpoint = [];

					const paramsArray = params.split(',');

					breakpoint.value = paramsArray[0];

					breakpoint.type = paramsArray[1] ? paramsArray[1].trim() : 'max';

					breakpoint.item = item;

					breakpointsArray.push(breakpoint);
				});

				// Получаем уникальные брейкпоинты
				let mediaQueries = breakpointsArray.map(function (item) {
					return (
						'(' +
						item.type +
						'-width: ' +
						item.value +
						'px),' +
						item.value +
						',' +
						item.type
					);
				});

				mediaQueries = mediaQueries.filter(function (item, index, self) {
					return self.indexOf(item) === index;
				});

				// Работаем с каждым брейкпоинтом
				mediaQueries.forEach((breakpoint) => {
					const paramsArray = breakpoint.split(',');

					const mediaBreakpoint = paramsArray[1];

					const mediaType = paramsArray[2];

					const matchMedia = window.matchMedia(paramsArray[0]);

					// Объекты с нужными условиями
					const spoilersArray = breakpointsArray.filter(function (item) {
						if (item.value === mediaBreakpoint && item.type === mediaType) {
							return true;
						}
					});

					// Событие
					matchMedia.addEventListener('change', function () {
						initSpoilers(spoilersArray, matchMedia);
					});

					initSpoilers(spoilersArray, matchMedia);
				});
			}
		}

		// Инициализация
		function initSpoilers(spoilersArray, matchMedia = false) {
			spoilersArray.forEach((spoilersBlock) => {
				spoilersBlock = matchMedia ? spoilersBlock.item : spoilersBlock;

				if (matchMedia.matches || !matchMedia) {
					spoilersBlock.classList.add('init');

					initSpoilerBody(spoilersBlock);

					spoilersBlock.addEventListener('click', setSpoilerAction);
				} else {
					spoilersBlock.classList.remove('init');

					initSpoilerBody(spoilersBlock, false);

					spoilersBlock.removeEventListener('click', setSpoilerAction);
				}
			});
		}

		// Работа с контентом
		function initSpoilerBody(spoilersBlock, hideSpoilerBody = true) {
			const spoilerTitles = spoilersBlock.querySelectorAll(
				'[data-spoiler-title]',
			);

			if (spoilerTitles.length > 0) {
				spoilerTitles.forEach((spoilerTitle) => {
					if (hideSpoilerBody) {
						spoilerTitle.removeAttribute('tabindex');

						if (!spoilerTitle.classList.contains('active')) {
							const spoilerTitleParent =
								spoilerTitle?.closest('[data-spoiler]');

							if (spoilerTitleParent) {
								const targetContent = spoilerTitleParent.querySelector(
									'[data-spoiler-content]',
								);

								targetContent.hidden = true;
							}
						}
					} else {
						spoilerTitle.setAttribute('tabindex', '-1');

						const spoilerTitleParent = spoilerTitle?.closest('[data-spoiler]');

						if (spoilerTitleParent) {
							const targetContent = spoilerTitleParent.querySelector(
								'[data-spoiler-content]',
							);

							targetContent.hidden = false;
						}
					}
				});
			}
		}

		function setSpoilerAction(e) {
			const el = e.target;

			if (
				el.hasAttribute('data-spoiler-title') ||
				el.closest('[data-spoiler-title]')
			) {
				const spoilerTitle = el.hasAttribute('data-spoiler-title')
					? el
					: el.closest('[data-spoiler-title]');

				const spoilersBlock = spoilerTitle.closest('[data-spoilers-list]');

				const oneSpoiler = spoilersBlock.hasAttribute('data-one-spoiler')
					? true
					: false;

				if (!spoilersBlock.querySelectorAll('.slide').length) {
					if (oneSpoiler && !spoilerTitle.classList.contains('active')) {
						hideSpoilersBody(spoilersBlock);
					}

					spoilerTitle.classList.toggle('active');

					const spoilerTitleParent = spoilerTitle.closest('[data-spoiler]');

					const targetContent = spoilerTitleParent.querySelector(
						'[data-spoiler-content]',
					);

					slideToggle(targetContent, durationSpeed);
				}
				e.preventDefault();
			}
		}

		function hideSpoilersBody(spoilersBlock) {
			const spoilerActiveTitle = spoilersBlock.querySelector(
				'[data-spoiler-title].active',
			);

			const activeTitleParent = spoilerActiveTitle.closest('[data-spoiler]');

			const targetContent = activeTitleParent.querySelector(
				'[data-spoiler-content]',
			);

			if (spoilerActiveTitle) {
				spoilerActiveTitle.classList.remove('active');

				slideUp(targetContent, durationSpeed);
			}
		}
	}
	spoilers(500);

	function goBackTop(offsetViewButton) {
		'use strict';

		// Получаем кнопку в переменную
		const btn = document?.querySelector('[data-go-back-top]');

		function btnActive() {
			// Сколько нужно проскролить, чтобы появилась кнопка
			const breakpoint = offsetViewButton;

			// Если прокрутили на значение breakpoint, задаём кнопке указанный класс
			if (window.scrollY >= breakpoint) {
				btn.classList.add('is-active');
			} else {
				btn.classList.remove('is-active');
			}
		}

		if (btn) {
			window.addEventListener('scroll', btnActive);

			btn.addEventListener('click', function () {
				window.scrollTo({
					top: 0,
					left: 0,
					behavior: 'smooth',
				});
			});
		}
	}
	goBackTop(800);

	(function inputMask() {
		'use strict';

		const itemsTel = document?.querySelectorAll('input[type="tel"]');

		if (itemsTel) {
			itemsTel.forEach(function (el) {
				Inputmask({ mask: `+7 (999) 999-99-99` }).mask(el);
			});
		}
	})();

	function digitalCounters(timeDuration) {
		'use strict';

		// Initialization counters
		function digitalCountersInit(digitalCountersItems) {
			let digitalCounters = digitalCountersItems
				? digitalCountersItems
				: document.querySelectorAll('[data-digital-counter]');

			if (digitalCounters) {
				digitalCounters.forEach((elemDC) => {
					digitalCountersAnimate(elemDC);
				});
			}
		}

		// Animation counters
		function digitalCountersAnimate(elemDC) {
			let startTimeDefault = null;

			const duration = parseInt(elemDC.dataset.digitalCounter)
				? parseInt(elemDC.dataset.digitalCounter)
				: timeDuration;

			const startValue = parseInt(elemDC.innerHTML);

			const startPosition = 0;

			const step = (timeDefault) => {
				if (!startTimeDefault) startTimeDefault = timeDefault;

				const progress = Math.min(
					(timeDefault - startTimeDefault) / duration,
					1,
				);

				elemDC.innerHTML = Math.floor(progress * (startPosition + startValue));

				if (progress < 1) {
					window.requestAnimationFrame(step);
				}
			};
			window.requestAnimationFrame(step);
		}

		// Start animation counters with scroll - observer system
		let options = {
			threshold: 0.3,
		};

		let observer = new IntersectionObserver((entries, observer) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					const targetElement = entry.target;

					const digitalCountersItems = targetElement.querySelectorAll(
						'[data-digital-counter]',
					);

					if (digitalCountersItems.length) {
						digitalCountersInit(digitalCountersItems);
					}

					observer.unobserve(targetElement);
				}
			});
		}, options);

		let sections = document.querySelectorAll('.section');

		if (sections.length) {
			sections.forEach((sec) => {
				observer.observe(sec);
			});
		}
	}
	digitalCounters(1200);

	function setElementsHeight(parentSelector, elementsSelector) {
		'use strict';

		const parents = document.querySelectorAll(parentSelector);

		if (!parents || parents.length === 0) {
			return;
		}

		parents.forEach(function (el) {
			const currentElements = el.querySelectorAll(elementsSelector);

			if (!currentElements || currentElements.length === 0) {
				console.warn('No titles found!');
				return;
			}

			const arrayHeights = [];

			currentElements.forEach((el) => {
				arrayHeights.push(el.offsetHeight);
			});

			const max = Math.max(...arrayHeights);

			currentElements.forEach((el) => {
				el.style.minHeight = `${max}px`;
			});
		});
	}
	setElementsHeight('.table', '.table__th');
	setElementsHeight('.table', '.table__td');

	(function getFullYear() {
		'use strict';

		const currentYear = new Date().getFullYear();

		const yearEl = document?.querySelector('.footer__year');

		const metaYear = document?.querySelector('[itemprop="copyrightYear"]');

		if (yearEl) {
			yearEl.innerHTML = currentYear;
		}

		if (metaYear) {
			metaYear.setAttribute('content', currentYear);
		}
	})();
});
