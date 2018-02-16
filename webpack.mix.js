let mix = require('laravel-mix');

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

mix
// main resources
.js('resources/assets/js/app.js', 'public/js')
.sass('resources/assets/sass/app.scss', 'public/css')
.sass('resources/assets/adminLTE/scss/AdminLTE.scss', 'public/css')

// another resource
.styles('node_modules/animate.css/animate.css','public/css/libs/animate.css')

// bower

