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

    mix.sass(['app.scss','light-bootstrap-dashboard.scss']);

    mix.styles([
    	'bootstrap.min.css',
    	'animate.min.css',
    	'light-bootstrap-dashboard.css',
    	'admin.css',
    	'pe-icon-7-stroke.css',
    	'jquery.tag-editor.css',
    	'../../../node_modules/jquery-ui-dist/jquery-ui.min.css'
    	],'public/css/admin.css');

    mix.styles([
    	'bootstrap_now.min.css',
    	'now-ui-kit.css',
    	'demo.css',
    	'gif.css',
    	'jquery.tag-editor.css'],'public/css/now.css');

});

elixir(function(mix){

	mix.scripts([
		'core/jquery.3.2.1.min.js',
		'core/tether.min.js',
		'core/bootstrap.min.js',
		'plugins/bootstrap-switch.js',
		'plugins/nouislider.min.js',
		'plugins/bootstrap-datepicker.js',
		'gif.js',
		'now-ui-kit.js'
	],'public/js/now.js');

	mix.scripts([
		'core/jquery.3.2.1.min.js',
		'core/tether.min.js',
		'core/bootstrap.min.js',
		'plugins/bootstrap-switch.js',
		'plugins/nouislider.min.js',
		'plugins/bootstrap-datepicker.js',
		'../../../node_modules/jquery-ui-dist/jquery-ui.min.js',
		'jquery.caret.min.js',
		'jquery.tag-editor.min.js'
	],'public/js/admin.js');
});