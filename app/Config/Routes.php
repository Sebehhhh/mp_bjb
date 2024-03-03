<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// HOMEPAGE
$routes->get('/', 'Home::index');
$routes->get('/calendar', 'Home::calendar');
$routes->get('/seller', 'Home::seller');
$routes->get('/about', 'Home::about');
$routes->get('/allProducts', 'Home::allProducts');
$routes->get('/news', 'Home::news');

// AUTH
$routes->get('login', 'AuthController::index');
$routes->post('act/login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// DASHBOARD
$routes->get('dashboard', 'DashboardController::index');

// NEWS CATEGORY
$routes->get('panel/cat_news', 'CatNewsController::index');
$routes->post('panel/cat_news/add', 'CatNewsController::store');
$routes->post('panel/cat_news/update/(:num)', 'CatNewsController::update/$1');
$routes->get('panel/cat_news/delete/(:num)', 'CatNewsController::delete/$1');
