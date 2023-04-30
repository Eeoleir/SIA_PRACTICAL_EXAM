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

$router->post('/add/teachers',['uses' => 'TeacherController@addTeacher']); //1

$router->delete('/delete/teachers/{id}',['uses' => 'TeacherController@deleteTeacher']); //2

$router->put('update/teachers/{id}',['uses' => 'TeacherController@updateTeacher']); //3

$router->get('find/teachers/{id}',['uses' => 'TeacherController@showTeacher']); //4

$router->get('show/teachers',['uses' => 'TeacherController@showALLTEACHERS']); //5





