<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
# $routes->get('/', 'Home::index');
$routes->get('/', 'GalleryController::index');
$routes->post('new', 'GalleryController::upload');
$routes->get('delete/(:any)', 'GalleryController::delete/$1');
$routes->get('download/(:any)', 'GalleryController::download/$1');
