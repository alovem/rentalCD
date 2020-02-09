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

$router->get('/mastercds', 'MasterController@index');
$router->get('/mastercds/{id}', 'MasterController@show');
$router->post('/mastercds', 'MasterController@store');



$router->put('/mastercds/{id}', 'MasterController@update');
$router->delete('/mastercds/{id}', 'MasterController@destroy');

$router->get('/mastercustomers', 'MasterCustomersController@index');
$router->get('/mastercustomers/{id}', 'MasterCustomersController@show');
$router->post('/mastercustomers', 'MasterCustomersController@store');
$router->put('/mastercustomers/{id}', 'MasterCustomersController@update');
$router->delete('/mastercustomers/{id}', 'MasterCustomersController@destroy');


$router->get('/mastercategories', 'MasterCategoriesController@index');
$router->get('/mastercategories/{id}', 'MasterCategoriesController@show');
$router->post('/mastercategories', 'MasterCategoriesController@store');


$router->post('/rental', 'RentalController@store');
$router->put('/rental/{id}', 'RentalController@update');

$router->get('/hello/{name}', function ($name) use ($router) {
    //return $router->app->version();
	return "<h1>Welcome To Rent CD</h1>";
});

$router->get('/key',function(){
	return \Illuminate\Support\Str::random(32);
});