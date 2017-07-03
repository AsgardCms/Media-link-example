<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/medialinkexample'], function (Router $router) {
    $router->bind('author', function ($id) {
        return app('Modules\MediaLinkExample\Repositories\AuthorRepository')->find($id);
    });
    $router->get('authors', [
        'as' => 'admin.MediaLinkExample.author.index',
        'uses' => 'AuthorController@index',
        'middleware' => 'can:MediaLinkExample.authors.index'
    ]);
    $router->get('authors/create', [
        'as' => 'admin.MediaLinkExample.author.create',
        'uses' => 'AuthorController@create',
        'middleware' => 'can:MediaLinkExample.authors.create'
    ]);
    $router->post('authors', [
        'as' => 'admin.MediaLinkExample.author.store',
        'uses' => 'AuthorController@store',
        'middleware' => 'can:MediaLinkExample.authors.create'
    ]);
    $router->get('authors/{author}/edit', [
        'as' => 'admin.MediaLinkExample.author.edit',
        'uses' => 'AuthorController@edit',
        'middleware' => 'can:MediaLinkExample.authors.edit'
    ]);
    $router->put('authors/{author}', [
        'as' => 'admin.MediaLinkExample.author.update',
        'uses' => 'AuthorController@update',
        'middleware' => 'can:MediaLinkExample.authors.edit'
    ]);
    $router->delete('authors/{author}', [
        'as' => 'admin.MediaLinkExample.author.destroy',
        'uses' => 'AuthorController@destroy',
        'middleware' => 'can:MediaLinkExample.authors.destroy'
    ]);
// append

});
