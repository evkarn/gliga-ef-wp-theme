// Основной модуль
import gulp from 'gulp';

// Импорт путей к файлам и папкам
import { path } from './gulp/config/path.js';

// Импорт плагинов
import { plugins } from './gulp/config/plugins.js';

// Передача значений в глобальную переменную для удобства настройки
global.app = {
	isBuild: process.argv.includes('--build'),
	isDev: !process.argv.includes('--build'),
	path: path,
	gulp: gulp,
	plugins: plugins
};

// Импорт созданных задач из папки tasks
import js from './gulp/tasks/js.js';
import styles from './gulp/tasks/styles.js';

// Основные задачи
const mainTasks = gulp.parallel(
	styles,
	js,
);

// Построение сценариев выполнения задач
const build = gulp.series(mainTasks);

// Экспорт сценариев
export {build};

// Выполнение сценариев по-умолчанию
gulp.task('default', build);
