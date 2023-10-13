<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('tables', 'Home::showTables');
$routes->get('furniture', 'Home::index');

$routes->get('furniture', 'Home::furniture');

$routes->get('register', 'Home::register');
// user login routes
$routes->get('login', 'Home::userLogin');

$routes->post('addingProduct', 'ProductController::insert');
$routes->get('/product/delete/(:num)', 'ProductController::deleteProduct/$1');
$routes->get('/delete/(:num)', 'ProductController::deleteProduct/$1');
$routes->get('product/get/(:num)', 'ProductController::getProduct/$1');
$routes->get('/get/(:num)', 'ProductController::getProduct/$1');
$routes->post('/product/update', 'ProductController::updateProduct');
$routes->get('product/(:num)', 'Home::showProduct/$1');

$routes->get('/signup', 'SignupController::index');
$routes->get('/logout', 'SigninController::logout');
$routes->match(['get', 'post'], 'register', 'SignupController::store');
$routes->match(['get', 'post'], 'login', 'SigninController::loginAuth');
$routes->match(['get', 'post'], 'admin', 'AdminController::adminAuth');
$routes->get('/adminLogin', 'AdminController::index');
$routes->get('/signin', 'SigninController::index');
$routes->get('/ecommerce', 'Home::userSide',['filter' => 'authGuard']);
$routes->get('/about', 'Home::about',['filter' => 'authGuard']);
$routes->get('/adminlogout', 'AdminController::logout');
$routes->get('/blog', 'Home::blog',['filter' => 'authGuard']);
$routes->get('/contact', 'Home::contact',['filter' => 'authGuard']);

$routes->get('/tables', 'Home::tables',['filter' => 'authGuard']);
$routes->get('/addProduct', 'ProductController::addProduct',['filter' => 'authGuard']);
$routes->get('/ecommerce', 'Home::userSide',['filter' => 'authGuard']);
$routes->get('/dashboard', 'Home::adminDashboard',['filter' => 'authGuard']);











