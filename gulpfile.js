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

elixir(function(mix) {
 //make changes to /resources/assets/main.scss
 //the following line will compile those to /public/css/main.css
 mix.sass('main.scss');

 //bring in font-awesome fonts:
 mix.copy('resources/assets/lib/font-awesome/fonts', 'public/fonts');

 //combine our main and font-awesome stylesheets into one 'app.css' file:
 mix.styles([
  'public/css/main.css',
  'resources/assets/lib/font-awesome/css/font-awesome.css'
 ],'public/css/app.css','./');

 mix.version('public/css/app.css');

 //combine the jquery, bootstrap, and app.js files into one file:
 mix.scripts([
  '../lib/jquery/dist/jquery.min.js',
  '../lib/bootstrap/dist/js/bootstrap.js',
  'app.js'
 ], 'public/js/app.js');
});


