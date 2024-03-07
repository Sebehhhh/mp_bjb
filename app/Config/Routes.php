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
$routes->get('/allNews', 'Home::allNews');

// AUTH
$routes->get('register', 'AuthController::register');
$routes->post('act/register', 'AuthController::registering');
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

// SELLER
$routes->get('panel/seller', 'SellerController::index');
$routes->post('panel/seller/add', 'SellerController::store');
$routes->post('panel/seller/update/(:num)', 'SellerController::update/$1');
$routes->get('panel/seller/delete/(:num)', 'SellerController::delete/$1');
$routes->get('/serial/update', 'SellerController::serialUpdate');

// NEWS
$routes->get('panel/news', 'NewsController::index');
$routes->post('panel/news/add', 'NewsController::store');
$routes->post('panel/news/update/(:num)', 'NewsController::update/$1');
$routes->get('panel/news/delete/(:num)', 'NewsController::delete/$1');

// PRODUCT
$routes->get('panel/product', 'ProductController::index');
$routes->post('panel/product/add', 'ProductController::store');
$routes->post('panel/product/update/(:num)', 'ProductController::update/$1');
$routes->get('panel/product/delete/(:num)', 'ProductController::delete/$1');
