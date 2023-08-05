const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss');
const path = require('path')

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/ass/app.css', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [
            tailwindcss('./tailwind.config.js')
        ]
    });
