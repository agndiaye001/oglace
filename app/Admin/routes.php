<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('produit', ProduitController::class);
    $router->resource('categories', ProduitTypeController::class);   
    $router->resource('barcodes', BarcodeController::class);
    $router->resource('chartjs', ChartjsController::class);
});
