<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//============== user ======================
$routes->get('/', 'UserController::index');
$routes->get('/checkout/pengiriman', 'UserController::checkout');
$routes->get('/checkout/pembayaran', 'UserController::bayar');

//============== kategori ======================
$routes->get('/kategori', 'UserController::kategori');
//==============end======================

$routes->get('/keranjang', 'UserController::keranjang');
$routes->post('/add-keranjang', 'UserController::addKeranjang');

$routes->get('/konfirmasi-pembayaran', 'UserController::konfirmasipembayaran');



//==============Auth myth======================

$routes->get('/login', 'Authcontroller::login');
$routes->get('/register', 'Authcontroller::register');

//==============end======================

//==============Dashboard admin======================
$routes->get('/dashboard', 'AdminController::index');
$routes->get('/hapus-produk/(:segment)', 'AdminController::hapusProduk/$1');
//==============end======================

//==============produk======================

$routes->get('/edit-produk', 'AdminController::editProduk');
$routes->post('/add-produk', 'AdminController::addProduk');
$routes->get('/get-subkategori', 'AdminController::getSubkategori');

//==============end======================

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

//================end =====================

//================diskon=====================
$routes->get('/edit-diskon', 'AdminController::editDiskon');
$routes->post('/add-diskon', 'AdminController::addDiskon');
$routes->get('/hapus-diskon/(:segment)', 'AdminController::hapusDiskon/$1');
//================end =====================

//================FS=====================
$routes->get('/edit-flash-sale', 'AdminController::editFlashSale');
$routes->post('/add-flash-sale', 'AdminController::addFlashSale');
$routes->get('/hapus-flash-sale/(:segment)', 'AdminController::deleteFlashSale/$1');


//================end =====================

//==============keatgori======================
$routes->get('/edit-kategori', 'AdminController::editKategori');
$routes->post('/add-kategori', 'AdminController::addKategori');
$routes->post('/add-subkategori', 'AdminController::addSubKategori');
$routes->get('/hapus-kategori/(:segment)', 'AdminController::hapusKategori/$1');
$routes->get('/hapus-subkategori/(:segment)', 'AdminController::hapusSubKategori/$1');

//==============end======================