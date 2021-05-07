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

mix.js(['public/assets/Front/js1/custom.js', 'public/assets/Front/js1/lottie-player.js'], 'public/assets/Front/js/app.js')
    .postCss(['public/assets/Front/css1/style.css', 'public/assets/Front/css1/sina.css'], 'public/assets/Front/css/style.css', [
        //
    ]);
// mix.copyDirectory('node_modules/tinymce/icons', 'public/node_modules/tinymce/icons');
// mix.copyDirectory('node_modules/tinymce/plugins', 'public/node_modules/tinymce/plugins');
// mix.copyDirectory('node_modules/tinymce/skins', 'public/node_modules/tinymce/skins');
// mix.copyDirectory('node_modules/tinymce/themes', 'public/node_modules/tinymce/themes');
// mix.copy('node_modules/tinymce/jquery.tinymce.js', 'public/node_modules/tinymce/jquery.tinymce.js');
// mix.copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/node_modules/tinymce/jquery.tinymce.min.js');
// mix.copy('node_modules/tinymce/tinymce.js', 'public/node_modules/tinymce/tinymce.js');
// mix.copy('node_modules/tinymce/tinymce.min.js', 'public/node_modules/tinymce/tinymce.min.js');