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

//==============admin======================
$routes->get('/dashboard', 'AdminController::index');
$routes->get('/edit-produk', 'AdminController::editProduk');

//================pay=====================
$routes->get('/edit-pembayaran', 'AdminController::editPembayaran');
$routes->post('/add-pembayaran', 'AdminController::addPembayaran');
$routes->get('/hapus-pembayaran/(:segment)', 'AdminController::hapusPembayaran/$1');
//================end=====================

//================ship=====================
$routes->get('/edit-pengiriman', 'AdminController::editPengiriman');
$routes->post('/add-pengiriman', 'AdminController::addPengiriman');
$routes->get('/hapus-pengiriman/(:segment)', 'AdminController::hapusPengiriman/$1');
//================end=====================

//================voucher=====================
$routes->get('/voucher', 'AdminController::Voucher');
$routes->post('/addVoucher', 'AdminController::addVoucher');
$routes->get('/hapus-voucher/(:segment)', 'AdminController::hapusVoucher/$1');

//================end voucher=====================

$routes->get('/edit-diskon', 'AdminController::editDiskon');
$routes->get('/edit-flash-sale', 'AdminController::editFlashSale');

//==============keatgori======================
$routes->get('/edit-kategori', 'AdminController::editKategori');
//==============end======================