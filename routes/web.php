<?php
/* @var \Illuminate\Routing\Router $router */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$router->get('/hooks/new', 'HomeController@new')->name('hooks.new');
$router->post('/hooks', 'HomeController@create')->name('hooks.create');
