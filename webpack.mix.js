const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
/*
Core
 */
mix.js('resources/js/core/*', 'public/js/core/main.js');
/*
User
 */
mix.js('resources/js/user/*', 'public/js/user/main.js');

mix.js('semantic/dist/semantic.js', 'public/js')
    .copy('semantic/dist/semantic.css', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');
