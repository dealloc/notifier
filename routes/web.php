<?php
/* @var \Illuminate\Routing\Router $router */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'WebhookController@index')->name('home');

$router->get('/hooks/new', 'WebhookController@new')->name('hooks.new');
$router->post('/hooks', 'WebhookController@create')->name('hooks.create');
