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

class AdminController extends BaseController
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
        $data['title']   = 'OttenCoffe | Dashboard';
        return view('admin/index', $data);
    }

    public function editProduk(): string
    {
        $data['title']   = 'OttenCoffe | Edit Produk';
        return view('admin/editProduk', $data);
    }
    public function editPembayaran(): string
    {
        $data['title']   = 'OttenCoffe | Edit Pembayaran';
        return view('admin/editMetodePembayaran', $data);
    }
    public function editPengiriman(): string
    {
        $data['title']   = 'OttenCoffe | Edit Pengiriman';
        return view('admin/editMetodePengiriman', $data);
    }
    public function editVoucher(): string
    {
        $data['title']   = 'OttenCoffe | Edit Voucher';
        return view('admin/editVoucher', $data);
    }
    public function editDiskon(): string
    {
        $data['title']   = 'OttenCoffe | Edit Diskon';
        return view('admin/editDiskon', $data);
    }
    public function editFlashSale(): string
    {
        $data['title']   = 'OttenCoffe | Edit Flash Sale';
        return view('admin/editFlashsale', $data);
    }
}