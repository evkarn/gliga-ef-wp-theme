// Плагин для получения пути к проекту
import * as nodePath from 'path';

// Путь к папке проекта
const rootFolder = nodePath.basename(nodePath.resolve());

const preprocessor = 'scss';

export const path = {
	build: {
		css: `./`,

		js: `./js/`,
	},

	// Пути к исходникам файлов
	src: {
		js: `./js/src/*.js`,

		styles: [
			`./${preprocessor}/*.${preprocessor}`,
			`!./${preprocessor}/_*.${preprocessor}`,
		],
	},

	rootFolder: rootFolder,
};
