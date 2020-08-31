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

mix.js('resources/js/app.js', 'public/js')
   .styles('resources/css/buscausuario.css', 'public/css/buscausuario.css')
   .styles('resources/css/contrast.css', 'public/css/contrast.css')
   .styles('resources/css/forum.css', 'public/css/forum.css')
   .styles('resources/css/lightbox.css','public/css/lightbox.css')
   .styles('resources/css/lmts.css','public/css/lmts.css')
   .styles('resources/css/lmts-app.css','public/css/lmts-app.css')
   .styles('resources/css/mensagens.css','public/css/mensagens.css');
