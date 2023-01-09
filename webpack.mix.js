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

const mix = require('laravel-mix');
const fs = require('fs');
const path = require('path');

mix.disableSuccessNotifications();

buildSass('resources/scss/pages/', 'public/assets/css');
buildJs('resources/js/pages/', 'public/assets/js');

mix.copyDirectory('resources/assets', 'public/assets')
    .version();

function findFiles(dir) {
    var results = [];
    var list = fs.readdirSync(dir);

    list.forEach(function(file) {
        file = dir + '/' + file;
        var stat = fs.statSync(file);
        if (stat && stat.isDirectory()) { 
            /* Recurse into a subdirectory */
            results = results.concat(findFiles(file));
        } else { 
            /* Is a file */
            results.push(file);
        }
    });

    return results;
}

function buildSass(dir, dest) {
    findFiles(dir).forEach(function (file) {

        if (!file.startsWith('_')) {
            mix.sass(file, dest);
        }
    });
}

function buildJs(dir, dest) {
    findFiles(dir).forEach(function (file) {

        if (!file.startsWith('_')) {
            mix.js(file, dest);
        }
    });
}
