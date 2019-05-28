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
    return redirect()->to('https://bahaso.com');
});

$router->post('/apis', 'ApiController@createUpdate');
$router->get('/apis', 'ApiController@index');
$router->get('/apis/search', 'ApiController@search');
$router->get('/apis/{id}', 'ApiController@show');


//$router->group(['prefix' => 'api'], function () use ($router) {
//
//    $router->get('/{route:.*}/', 'ApiController@customRoute');
//    $router->post('/{route:.*}/', 'ApiController@route');
//    $router->put('/{route:.*}/', 'ApiController@route');
//    $router->delete('/{route:.*}/', 'ApiController@route');
//    $router->patch('/{route:.*}/', 'ApiController@route');
//
//});

