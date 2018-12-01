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
    return $router->app->version();
});

//Clientes
$router->get('/clientes', 'ClientesController@getAllClientes');
//Enderecos distancia
$router->get('/enderecos-distancia', 'ClientesController@getEnderecosPorDistancia');

$router->group(['prefix' => 'api/clientes'], function() use ($router) {
    $router->post('/cadastrar', 'ClientesController@cadastraClientes');
    $router->delete('/deletar/{id}','ClientesController@removeCliente');
    $router->post('/atualizar','ClientesController@atualizaEndereco');
});

$router->group(['prefix' => 'api/enderecos'], function() use ($router) {
    $router->post('/cadastrar','EnderecosController@cadastraEnderecos');
});
