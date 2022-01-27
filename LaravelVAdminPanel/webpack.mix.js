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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/returnPage.js', 'public/js')
    .js('resources/js/main_all_block.js', 'public/js')
    .js('resources/js/control_posts.js', 'public/js')
    .js('resources/js/ajax.js', 'public/js')
    .js('resources/js/tinymce/tinymce.min.js', 'public/js/tinymce')
    .js('resources/js/initTinymce.js', 'public/js')
    .sass('resources/css/login.scss', 'public/css')
    .sass('resources/css/style.scss', 'public/css');
