<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use App\Models\DiskonModel;
use App\Models\FlashSaleModel;
use App\Models\ProdukModel;
use App\Models\KategoriProdukModel;
use App\Models\SubKategoriProdukModel; // Corrected class name
use App\Models\PemesananModel;
use App\Models\RincianPemesananModel;
use App\Models\MetodePembayaranModel; // Corrected class name
use App\Models\MetodePengirimanModel;

class UserController extends BaseController
{
    protected $PenggunaModel;
    protected $DiskonModel;
    protected $FlashSaleModel;
    protected $ProdukModel;
    protected $KategoriProdukModel;
    protected $SubKategoriProdukModel; // Corrected property name
    protected $PemesananModel;
    protected $RincianPemesananModel;
    protected $MetodePembayaranModel; // Corrected property name
    protected $MetodePengirimanModel;

    public function __construct()
    {
        $this->PenggunaModel = new PenggunaModel();
        $this->DiskonModel = new DiskonModel();
        $this->FlashSaleModel = new FlashSaleModel(); // Corrected class name
        $this->ProdukModel = new ProdukModel(); // Corrected class name
        $this->KategoriProdukModel = new KategoriProdukModel();
        $this->SubKategoriProdukModel = new SubKategoriProdukModel(); // Corrected class name
        $this->PemesananModel = new PemesananModel();
        $this->RincianPemesananModel = new RincianPemesananModel();
        $this->MetodePembayaranModel = new MetodePembayaranModel(); // Corrected class name
        $this->MetodePengirimanModel = new MetodePengirimanModel();
    }

    public function index(): string
    {
        $data['title']   = 'OttenCoffe';
        return view('user/index', $data);
    }


    public function login()
    {
        $data['title']   = 'Login';
        return view('admin/auth/login', $data);
    }
    public function register()
    {
        $data['title']   = 'Register';
        return view('admin/auth/register', $data);
    }

    public function kategori()
    {
        $data['title']   = 'Kategori';
        echo view('user/category/coffee/dripCoffee', $data);
    }
    public function keranjang()
    {
        $data['title']   = 'Keranjang';
        echo view('user/keranjang', $data);
    }

    public function checkout()
    {
        $data['title']   = 'Checkout';
        return view('user/checkoutPengiriman', $data);
    }

    public function bayar()
    {
        $data['title']   = 'Pembayaran';
        return view('user/checkoutPembayaran', $data);
    }
    public function konfirmasipembayaran()
    {
        $data['title']   = 'Konfirmasi';
        echo view('user/konfirmasipembayaran', $data);
    }
}