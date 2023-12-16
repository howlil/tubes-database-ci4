<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::index');
$routes->get('/checkout/pengiriman', 'UserController::checkout');
$routes->get('/checkout/pembayaran', 'UserController::bayar');
$routes->get('/login', 'UserController::login');
$routes->get('/register', 'UserController::register');
$routes->get('/ketegori/dripcoffee', 'UserController::kategori');
$routes->get('/keranjang', 'UserController::keranjang');
$routes->get('/konfirmasi-pembayaran', 'UserController::konfirmasipembayaran');

//admin
$routes->get('/dashboard', 'AdminController::index');
$routes->get('/edit-produk', 'AdminController::editProduk');
$routes->get('/edit-pembayaran', 'AdminController::editPembayaran');
$routes->get('/edit-pengiriman', 'AdminController::editPengiriman');
$routes->get('/edit-voucher', 'AdminController::editVoucher');
$routes->get('/edit-diskon', 'AdminController::editDiskon');
$routes->get('/edit-flash-sale', 'AdminController::editFlashSale');