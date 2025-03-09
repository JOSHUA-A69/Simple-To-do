// filepath: webpack.mix.js
const mix = require('laravel-mix');

mix.css('resources/css/home.css', 'public/css')
   .css('resources/css/create.css', 'public/css')
   .css('resources/css/edit.css', 'public/css')
   .css('resources/css/style.css', 'public/css');