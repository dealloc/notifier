<?php
/* @var \Illuminate\Routing\Router $router */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

$router->group(['middleware' => 'auth'], function(\Illuminate\Routing\Router $router) {
    $router->get('/home', 'WebhookController@index')->name('home');
    $router->get('/hooks/new', 'WebhookController@new')->name('hooks.new');
    $router->post('/hooks', 'WebhookController@create')->name('hooks.create');
    $router->get('/hooks/{webhook}', 'WebhookController@show')->name('hooks.show');
    $router->post('/hooks/{webhook}', 'WebhookController@update')->name('hooks.update');
});
