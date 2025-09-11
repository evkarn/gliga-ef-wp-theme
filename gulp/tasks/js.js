// Обработка ошибок
import plumberInit from './plumber.js';

// Минимизация файлов
import terser from 'terser-webpack-plugin';

// Обработка скриптов
import webpack from 'webpack-stream';

// Отслеживание изменений в файлах
import { compareContents } from 'gulp-changed';

export default function js() {
	// Находим js файлы в папке исходников
	return (
		app.gulp
			.src(app.path.src.js, { source: app.isDev })

			// Вывод сообщения об ошибке, если появляется ошибка
			.pipe(app.plugins.plumber(plumberInit('JS')))

			// Проверяем были ли изменения в файлах
			.pipe(
				app.plugins.changed(app.path.src.js, { hasChanged: compareContents }),
			)

			// Обработка файлов js в режиме production
			.pipe(
				webpack({
					mode: 'production',

					entry: {
						'customizer.min': './js/src/customizer.js',
						'navigation.min': './js/src/navigation.js',
						'scripts.min': './js/src/scripts.js',
					},

					output: {
						filename: '[name].js',
					},

					module: {
						rules: [
							{
								test: /\.m?js$/,

								exclude: /(node_modules|bower_components)/,

								use: {
									loader: 'babel-loader',

									options: {
										presets: [
											[
												'@babel/preset-env',
												{
													targets: 'defaults',
												},
											],
										],

										plugins: ['babel-plugin-root-import'],
									},
								},
							},
						],
					},

					optimization: {
						minimize: true,

						minimizer: [
							new terser({
								include: /\.min\.js$/,

								terserOptions: { format: { comments: false } },

								extractComments: false,
							}),
						],
					},

					devtool: false,
				}),
			)

			// Выгрузка файл в папку проекта
			.pipe(app.gulp.dest(app.path.build.js))

			// При обновлении файла перезагружаем страницу
			.pipe(app.plugins.browsersync.stream())
	);
}
