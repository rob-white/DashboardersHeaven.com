var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    jquery: 'vendor/jquery/',
    bootstrap: 'vendor/bootstrap/'
};

elixir(function(mix) {
    mix.styles([
        paths.bootstrap + 'bootstrap.css',
        paths.bootstrap + 'bootstrap-solid-theme.css',
        paths.bootstrap + 'font-awesome.min.css'
    ], null, 'resources/assets/css/');

    mix.scripts([
        paths.jquery + 'jquery-2.1.4.min.js',
        paths.bootstrap + 'bootstrap.min.js'
    ], null, 'resources/assets/js/');

    mix.version(['public/css/all.css', 'public/js/all.js']);
    mix.copy('resources/assets/fonts', 'public/build/fonts');
});
