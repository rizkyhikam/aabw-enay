<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/akun1', 'Akun1::index');
$routes->get('akun1/new', 'Akun1::new');
$routes->post('akun1', 'Akun1::store');

$routes->get('akun1/edit/(:num)', 'Akun1::edit/$1');
$routes->post('akun1/edit/(:num)', 'Akun1::update/$1');
$routes->delete('/akun1/(:any)', 'Akun1::destroy/$1');

$routes->get('/akun2/new', 'Akun2::new');
$routes->get('/akun2/(:segment)/edit', 'Akun2::edit/$1');
$routes->post('/akun2/(:any)/edit', 'Akun2::edit/$1');

$routes->get('/akun3/new', 'Akun3::new');
$routes->post('/akun3/new', 'Akun3::create');
$routes->get('/akun3/(:segment)/edit', 'Akun3::edit/$1');

$routes->get('/transaksi', 'Transaksi::index');
$routes->post('/transaksi', 'Transaksi::create');
$routes->get('/transaksi/(:segment)/edit', 'Transaksi::edit/$1');
$routes->get('/transaksi/akun3', 'Transaksi::akun3');
$routes->get('/transaksi/status', 'Transaksi::status');
$routes->resource('transaksi');

$routes->get('/penyesuaian/new', 'Penyesuaian::new');
$routes->get('/penyesuaian', 'Penyesuaian::index');
$routes->post('/penyesuaian/(:any)', 'Penyesuaian::delete/$1');
$routes->get('/penyesuaian/(:segment)/edit', 'Penyesuaian::edit/$1');
$routes->get('/penyesuaian/(:any)', 'Penyesuaian::show/$1');

$routes->get('/jurnalumum', 'JurnalUmum::index');
$routes->post('/jurnalumum', 'JurnalUmum::index');
$routes->post('/jurnalumum/cetakpdf', 'JurnalUmum::cetakPDF');

$routes->get('/posting', 'Posting::index');
$routes->post('/posting', 'Posting::index');
$routes->post('/posting/postingpdf', 'Posting::postingpdf');

$routes->resource('akun2');
$routes->resource('akun3');
$routes->resource('transaksi');
$routes->resource('penyesuaian');