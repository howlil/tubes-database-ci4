<?php

use CodeIgniter\Router\RouteCollection;
use Myth\Auth\Config\Auth as AuthConfig;
/**
 * @var RouteCollection $routes
 */
$config         = config(AuthConfig::class);
$reservedRoutes = $config->reservedRoutes;


//============== user ======================
$routes->get('/', 'UserController::index');

//==============end======================

//============== user ======================
$routes->get('/setting', 'UserController::setting');
$routes->post('/update-profile', 'UserController::updateProfile');


//==============end======================


$routes->get('/checkout/pengiriman', 'UserController::checkout');
$routes->get('/checkout/pembayaran', 'UserController::bayar');

//============== kategori ======================
$routes->get('/kategori', 'UserController::kategori');
//==============end======================

$routes->get('/keranjang', 'UserController::keranjang');
$routes->post('/add-keranjang', 'UserController::addKeranjang');

$routes->get('/konfirmasi-pembayaran', 'UserController::konfirmasipembayaran');



//==============Auth myth======================

// Login/out

$routes->get('/login', 'Authcontroller::login');
$routes->get('/register', 'Authcontroller::register');

//==============end======================

//==============Dashboard admin======================
$routes->get('/dashboard', 'AdminController::index', ['filter' => 'role:admin'] );
$routes->get('/hapus-produk/(:segment)', 'AdminController::hapusProduk/$1', ['filter' => 'role:admin'] );
//==============end======================

//==============produk======================

$routes->get('/edit-produk', 'AdminController::editProduk', ['filter' => 'role:admin'] );
$routes->post('/add-produk', 'AdminController::addProduk', ['filter' => 'role:admin'] );
$routes->get('/get-subkategori', 'AdminController::getSubkategori', ['filter' => 'role:admin'] );

//==============end======================

//================pay=====================
$routes->get('/edit-pembayaran', 'AdminController::editPembayaran', ['filter' => 'role:admin'] );
$routes->post('/add-pembayaran', 'AdminController::addPembayaran', ['filter' => 'role:admin'] );
$routes->get('/hapus-pembayaran/(:segment)', 'AdminController::hapusPembayaran/$1', ['filter' => 'role:admin'] );
//================end=====================

//================ship=====================
$routes->get('/edit-pengiriman', 'AdminController::editPengiriman', ['filter' => 'role:admin'] );
$routes->post('/add-pengiriman', 'AdminController::addPengiriman', ['filter' => 'role:admin'] );
$routes->get('/hapus-pengiriman/(:segment)', 'AdminController::hapusPengiriman/$1', ['filter' => 'role:admin'] );
//================end=====================

//================voucher=====================
$routes->get('/voucher', 'AdminController::Voucher', ['filter' => 'role:admin'] );
$routes->post('/addVoucher', 'AdminController::addVoucher', ['filter' => 'role:admin'] );
$routes->get('/hapus-voucher/(:segment)', 'AdminController::hapusVoucher/$1', ['filter' => 'role:admin'] );

//================end =====================

//================diskon=====================
$routes->get('/edit-diskon', 'AdminController::editDiskon', ['filter' => 'role:admin'] );
$routes->post('/add-diskon', 'AdminController::addDiskon', ['filter' => 'role:admin'] );
$routes->get('/hapus-diskon/(:segment)', 'AdminController::hapusDiskon/$1', ['filter' => 'role:admin'] );
//================end =====================

//================FS=====================
$routes->get('/edit-flash-sale', 'AdminController::editFlashSale', ['filter' => 'role:admin'] );
$routes->post('/add-flash-sale', 'AdminController::addFlashSale', ['filter' => 'role:admin'] );
$routes->get('/hapus-flash-sale/(:segment)', 'AdminController::deleteFlashSale/$1', ['filter' => 'role:admin'] );


//================end =====================

//==============keatgori======================
$routes->get('/edit-kategori', 'AdminController::editKategori', ['filter' => 'role:admin'] );
$routes->post('/add-kategori', 'AdminController::addKategori', ['filter' => 'role:admin'] );
$routes->post('/add-subkategori', 'AdminController::addSubKategori', ['filter' => 'role:admin'] );
$routes->get('/hapus-kategori/(:segment)', 'AdminController::hapusKategori/$1', ['filter' => 'role:admin'] );
$routes->get('/hapus-subkategori/(:segment)', 'AdminController::hapusSubKategori/$1', ['filter' => 'role:admin'] );

//==============end======================