<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// HOMEPAGE
$routes->get('/', 'Home::index');

// AUTH
$routes->get('login', 'AuthController::index');
$routes->post('act/login', 'AuthController::login');

// DASHBOARD
$routes->get('dashboard', 'DashboardController::index');
