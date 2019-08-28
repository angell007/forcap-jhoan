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

mix.scripts(['resources/js/capas.js',
            'resources/js/ofertas.js',
            'resources/js/empresarios.js',
            'resources/js/unidad.js'
        ],
        'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css');
