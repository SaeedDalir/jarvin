<?php

$router->group(['prefix' => 'v1' , 'namespace' => 'V1'] , function () use ($router) {
    $router->post('login' , 'UserController@login');
    $router->post('register' , 'UserController@register');
    $router->group(['middleware' => 'auth'] , function () use ($router) {
        $router->get('/profile' , 'UserController@showUserProfile');
        $router->post('/profile/{id}/edit' , 'UserController@update');
        $router->delete('/users/{id}' , 'UserController@destroy');
    });
});
