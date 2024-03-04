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

// NEWS CATEGORY
$routes->get('panel/users', 'UserController::index');
$routes->post('panel/users/add', 'UserController::store');
$routes->post('panel/users/update/(:num)', 'UserController::update/$1');
$routes->get('panel/users/delete/(:num)', 'UserController::delete/$1');

// PRODUCT CATEGORY
$routes->get('panel/cat_product', 'CatProductController::index');
$routes->post('panel/cat_product/add', 'CatProductController::store');
$routes->post('panel/cat_product/update/(:num)', 'CatProductController::update/$1');
$routes->get('panel/cat_product/delete/(:num)', 'CatProductController::delete/$1');

// PRODUCT CATEGORY
$routes->get('panel/seller', 'SellerController::index');
$routes->post('panel/seller/add', 'SellerController::store');
$routes->post('panel/seller/update/(:num)', 'SellerController::update/$1');
$routes->get('panel/seller/delete/(:num)', 'SellerController::delete/$1');
