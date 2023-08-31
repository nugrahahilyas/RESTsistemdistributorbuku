<?php

use CodeIgniter\Router\RouteCollection;

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/penerbit', 'PenerbitController::index');
$routes->post('/penerbit', 'PenerbitController::create');
$routes->put('/penerbit/(:num)', 'PenerbitController::update/$1');
$routes->delete('/penerbit/(:num)', 'PenerbitController::delete/$1');
