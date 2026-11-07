<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/akun1', 'Akun1::index');
$routes->get('akun1/new', 'Akun1::new');
$routes->post('akun1', 'Akun1::store');

$routes->get('akun1/edit/(:num)', 'Akun1::edit/$1');
$routes->post('akun1/edit/(:num)', 'Akun1::update/$1');