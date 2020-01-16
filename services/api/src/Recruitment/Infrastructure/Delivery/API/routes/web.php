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

$router->get('status', 'StatusController@get');
$router->get('download/search/{term}', 'DownloadController@search');
$router->get('download/torrents', 'DownloadController@torrents');
$router->post('download/torrents', 'DownloadController@add');
