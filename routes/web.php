<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/users',['uses' => 'TeacherController@addTeacher']); //1

$router->delete('/users/{id}',['uses' => 'TeacherController@deleteTeacher']); //2

$router->put('users/update/{id}',['uses' => 'TeacherController@updateTeacher']); //3

$router->get('/users/{id}','TeacherController@showTeacher'); //4

$router->get('/users',['uses' => 'TeacherController@showALLTEACHERS']);//5




