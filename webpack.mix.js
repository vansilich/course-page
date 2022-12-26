const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
const path = require('path');

mix.disableSuccessNotifications();

function findFiles(dir) {
    const fs = require('fs');

    return fs.readdirSync(dir).filter(file => {
        return fs.statSync(`${dir}/${file}`).isFile();
    });
}

function buildSass(dir, dest) {
    findFiles(dir).forEach(function (file) {

        if (!file.startsWith('_')) {
            mix.sass(dir + '/' + file, dest);
        }
    });
}

function buildJs(dir, dest) {
    findFiles(dir).forEach(function (file) {

        if (!file.startsWith('_')) {
            mix.js(dir + '/' + file, dest);
        }
    });
}

buildSass('resources/scss/pages/courses/compas_3d/', 'public/assets/css');
buildJs('resources/js/pages/courses/compas_3d/', 'public/assets/js');

mix.copyDirectory('resources/assets', 'public/assets')
    .version();

