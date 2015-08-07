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
    bootstrap: 'vendor/bootstrap/',
    d3: 'vendor/d3/',
    underscore: 'vendor/underscore/'
};

elixir(function (mix) {
    mix.styles([
        paths.bootstrap + 'bootstrap.css',
        paths.bootstrap + 'prettyPhoto.css',
        paths.bootstrap + 'hoverex-all.css',
        paths.bootstrap + 'bootstrap-solid-theme.css',
        paths.bootstrap + 'font-awesome.min.css',
        'custom.css',
        'app.css'
    ], null, 'resources/assets/css/');

    mix.scripts([
        paths.jquery + 'jquery-2.1.4.min.js',
        paths.bootstrap + 'bootstrap.min.js',
        paths.underscore + 'underscore.min.js',
        paths.d3 + 'd3.min.js',
        paths.d3 + 'd3.scatterchart.js',
        paths.jquery + 'retina-1.1.0.js',
        paths.jquery + 'jquery.hoverdir.js',
        paths.jquery + 'jquery.hoverex.min.js',
        paths.jquery + 'jquery.prettyPhoto.js',
        paths.jquery + 'jquery.isotope.min.js',
        paths.jquery + 'jquery.imagesloaded.js',
        'app.js'
    ], null, 'resources/assets/js/');

    mix.version(['public/css/all.css', 'public/js/all.js']);
    mix.copy('resources/assets/fonts', 'public/build/fonts');
});
