<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
# $routes->get('/', 'Home::index');
$routes->get('/', 'GalleryController::index');
$routes->post('new', 'GalleryController::upload');
$routes->post('delete', 'GalleryController::delete');
