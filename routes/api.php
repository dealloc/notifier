<?php
/* @var \Illuminate\Routing\Router $router */

use Illuminate\Http\Request;

$router->get('/gitlab', 'Api\GitlabController@index');