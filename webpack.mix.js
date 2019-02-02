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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.sass('public/scss/style.scss', 'public/css/all.css').version();
mix.sass('public/scss/custom-style.scss', 'public/css/custom-style.css').version();

mix.js('resources/js/echo.js', 'public/js/echo.js').version();

mix.scripts([
    'public/js/jquery/jquery-2.2.4.min.js',
    'public/js/bootstrap/popper.min.js',
    'public/js/plugins/plugins.js',
    'public/js/active.js'
], 'public/js/all.js').version();