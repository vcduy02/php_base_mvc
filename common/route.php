<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

$router->get('/',[App\Controllers\ProductController::class,'index']);

//Products
$router->get('list-product',[App\Controllers\ProductController::class,'index']);
$router->get('add-product',[App\Controllers\ProductController::class,'addProduct']);
$router->post('post-product',[App\Controllers\ProductController::class,'postProduct']);
$router->get('detail-product/{id}',[App\Controllers\ProductController::class,'detailProduct']);
$router->post('edit-product/{id}',[App\Controllers\ProductController::class,'editProduct']);
$router->get('delete-product/{id}', [App\Controllers\ProductController::class, 'destroyProduct']);

//Customers
$router->get('list-customer', [App\Controllers\CustomerController::class, 'index']);
$router->get('add-customer', [App\Controllers\CustomerController::class, 'addCustomer']);
$router->post('post-customer', [App\Controllers\CustomerController::class, 'postCustomer']);
$router->get('detail-customer/{id}',[App\Controllers\CustomerController::class,'detailCustomer']);
$router->post('edit-customer/{id}',[App\Controllers\CustomerController::class,'editCustomer']);
$router->get('delete-customer/{id}', [App\Controllers\CustomerController::class, 'destroyCustomer']);

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;

?>