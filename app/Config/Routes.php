<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// HOMEPAGE
$routes->get('/', 'Home::index');
$routes->get('/calendar', 'Home::calendar');
$routes->get('/about', 'Home::about');
$routes->get('/detail', 'Home::detail');

// AUTH
$routes->get('login', 'AuthController::index');
$routes->post('act/login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// DASHBOARD
$routes->get('dashboard', 'DashboardController::index');
