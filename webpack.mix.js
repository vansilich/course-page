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

mix.js('resources/js/app.js', 'public/assets/js')
    .copyDirectory('resources/assets', 'public/assets')
    .sass('resources/scss/app.scss', 'public/assets/css').options({
        processCssUrls: false
    })
    .version()
