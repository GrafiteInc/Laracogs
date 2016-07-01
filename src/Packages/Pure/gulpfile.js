var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass([
        'app.scss'
    ], 'resources/assets/css/app.css')
    .styles([
        '/resources/assets/css/pure.min.css',
        '/resources/assets/css/app.css',
    ], 'public/css/app.css', __dirname);
})

elixir(function(mix) {
    mix.scripts([
    '/resources/assets/js/app.js',
    ]);
});
