<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('api', function($routes) {
    $routes->get('users', 'ApiController::index');  // Changed from 'items' to 'users'
    $routes->get('users/(:any)', 'ApiController::show/$1');
    $routes->post('users', 'ApiController::create');
    $routes->put('users/(:num)', 'ApiController::update/$1');
    $routes->delete('users/(:num)', 'ApiController::delete/$1');
    $routes->post('users/login', 'ApiController::login');
    $routes->get('inquery', 'InqueryController::index');
    $routes->post('inquery', 'InqueryController::create');


});
