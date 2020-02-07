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

$router->get('/hello/{name}', function ($name) use ($router) {
    //return $router->app->version();
	return "<h1>Kodingn</h1><p>Selamat Datang".$name." di Kodingin</p>";
});

$router->get('/key',function(){
	return \Illuminate\Support\Str::random(32);
});