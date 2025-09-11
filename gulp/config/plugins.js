// Локальный сервер
import browsersync from 'browser-sync';

// Отслеживание изменений в файлах
import changed from 'gulp-changed';
import newVer from 'gulp-newer';

// Условное ветвление
import ifPlugin from 'gulp-if';

// Сообщения (подсказки)
import notify from 'gulp-notify';

// Обработка ошибок
import plumber from 'gulp-plumber';

// Переименовывание файлов
import rename from 'gulp-rename';

// Поиск и замена
import replace from 'gulp-replace';

// Экспортируемые объекты
export const plugins = {
	browsersync: browsersync,
	changed: changed,
	newVer: newVer,
	if: ifPlugin,
	notify: notify,
	plumber: plumber,
	rename: rename,
	replace: replace,
};
