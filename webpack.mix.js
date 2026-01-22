const mix = require('laravel-mix');

mix.setPublicPath('public')
    .css('resources/css/app.css', 'public/css')
    .js('resources/js/app.js', 'public/js');
