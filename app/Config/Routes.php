<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\UserController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/profile/(:any)/(:any)/(:any)', 'Home::profile/$1/$2/$3');
$routes->get('/user/profile','UserController::profile');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/store', 'UserController::store');