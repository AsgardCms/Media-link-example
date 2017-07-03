<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/medialinkexample'], function (Router $router) {
    $router->bind('author', function ($id) {
        return app('Modules\Medialinkexample\Repositories\AuthorRepository')->find($id);
    });
    $router->get('authors', [
        'as' => 'admin.medialinkexample.author.index',
        'uses' => 'AuthorController@index',
        'middleware' => 'can:medialinkexample.authors.index'
    ]);
    $router->get('authors/create', [
        'as' => 'admin.medialinkexample.author.create',
        'uses' => 'AuthorController@create',
        'middleware' => 'can:medialinkexample.authors.create'
    ]);
    $router->post('authors', [
        'as' => 'admin.medialinkexample.author.store',
        'uses' => 'AuthorController@store',
        'middleware' => 'can:medialinkexample.authors.create'
    ]);
    $router->get('authors/{author}/edit', [
        'as' => 'admin.medialinkexample.author.edit',
        'uses' => 'AuthorController@edit',
        'middleware' => 'can:medialinkexample.authors.edit'
    ]);
    $router->put('authors/{author}', [
        'as' => 'admin.medialinkexample.author.update',
        'uses' => 'AuthorController@update',
        'middleware' => 'can:medialinkexample.authors.edit'
    ]);
    $router->delete('authors/{author}', [
        'as' => 'admin.medialinkexample.author.destroy',
        'uses' => 'AuthorController@destroy',
        'middleware' => 'can:medialinkexample.authors.destroy'
    ]);
// append

});
