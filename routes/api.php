<?php
/* @var \Illuminate\Routing\Router $router */

use Illuminate\Http\Request;

$router->post('/gitlab', 'Api\GitlabController@index');