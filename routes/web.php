<?php

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
    return view('home');
});

$router->group(['middleware' => 'throttle:10,1,show'], function () use ($router) {
    $router->get('/show/{uuid}', ['uses' => 'EntryController@show', 'as' => 'entries.show']);
});

$router->group(['middleware' => 'throttle:5,1,action'], function () use ($router) {
    $router->post('/', ['uses' => 'EntryController@store', 'as' => 'entries.store']);
    $router->get('/delete/{uuidDelete}', ['uses' => 'EntryController@destroy', 'as' => 'entries.destroy']);
});

$router->get('/create', ['uses' => 'EntryController@create', 'as' => 'entries.create']);
