<?php

use \Bramus\Router\Router;
use Quanghuy\Mvcoop\Controllers\Client\HomeController;
use Quanghuy\Mvcoop\Controllers\Admin\DashboardController;
use Quanghuy\Mvcoop\Controllers\Admin\UserController;
use Quanghuy\Mvcoop\Controllers\Admin\CategoryController;
use Quanghuy\Mvcoop\Controllers\Admin\PostsController as PostsAdminController;
use Quanghuy\Mvcoop\Controllers\Client\PostsController as PostsClientController;
use Quanghuy\Mvcoop\Controllers\Client\CategoryClientController;
use Quanghuy\Mvcoop\Controllers\LoginController;
use Quanghuy\Mvcoop\Controllers\LogoutController;

$router = new Router();

$router->get('/', HomeController::class . '@index');

$router->get('/post/{id}', PostsClientController::class . '@show');

$router->get('/category/{id}', CategoryClientController::class . '@show');

$router->get('/login', LoginController::class . '@index');

$router->post('/login', LoginController::class . '@check');

$router->get('/logout', LogoutController::class . '@logout');

$router->mount('/admin', function () use ($router) {
   $router->get('/', DashboardController::class . '@index');
   $router->mount('/users', function () use ($router) {
      $router->get('/', UserController::class . '@index');
      $router->get('/create', UserController::class . '@create');
      $router->get('/update/{id}', UserController::class . '@update');
      $router->get('/show', UserController::class . '@show');
      $router->get('/delete/{id}', UserController::class . '@delete');
   });

   $router->mount('/category', function () use ($router) {
      $router->get('/', CategoryController::class . '@show');
      $router->get('/create', CategoryController::class . '@create');
      $router->post('/create', CategoryController::class . '@createPost');
      $router->get('/update/{id}', CategoryController::class . '@update');
      $router->post('/update/{id}', CategoryController::class . '@updatePost');
      $router->get('/delete/{id}', CategoryController::class . '@delete');
   });

   $router->mount('/posts', function () use ($router) {
      $router->get('/', PostsAdminController::class . '@show');
      $router->get('/create', PostsAdminController::class . '@create');
      $router->post('/create', PostsAdminController::class . '@createPost');
      $router->get('/update/{id}', PostsAdminController::class . '@update');
      $router->post('/update/{id}', PostsAdminController::class . '@updatePost');
      $router->get('/delete/{id}', PostsAdminController::class . '@delete');
   });
});
$router->run();
