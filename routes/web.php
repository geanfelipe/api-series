<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/api','middleware'=>'auth'], function() use ($router) {
    
    $router->group(['prefix' => 'series'], function() use ($router) {
        $router->get('','SeriesController@index');
        $router->get('{id}','SeriesController@show');
        $router->put('{id}','SeriesController@update');
        $router->delete('{id}','SeriesController@destroy');
        $router->post('','SeriesController@store');

        $router->get('{serieId}/episodios','EpisodiosController@buscarPorSerie');
    });

    $router->group(['prefix' => 'episodios'], function() use ($router) {
        $router->get('','EpisodiosController@index');
        $router->get('{id}','EpisodiosController@show');
        $router->put('{id}','EpisodiosController@update');
        $router->delete('{id}','EpisodiosController@destroy');
        $router->post('','EpisodiosController@store');
    });
});

$router->post('/api/login','TokenController@gerarToken');

    