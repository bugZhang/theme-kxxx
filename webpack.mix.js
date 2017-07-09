const { mix } = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//     .js('resources/assets/js/tool.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css')
    // .copy('node_modules/animate.css/animate.css', 'public/css/animate.css')
    // .copy('node_modules/angular-ui-notification/demo/angular-ui-notification.min.js', 'public/js/angular-ui-notification.min.js');

mix.disableNotifications();
mix.sass('sass/style.scss', './');



