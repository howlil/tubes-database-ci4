<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use App\Models\DiskonModel;
use App\Models\VoucherModel;
use App\Models\FlashSaleModel;
use App\Models\ProdukModel;
use App\Models\KategoriProdukModel;
use App\Models\SubKategoriProdukModel; // Corrected class name
use App\Models\PemesananModel;
use App\Models\RincianPemesananModel;
use App\Models\MetodePembayaranModel; // Corrected class name
use App\Models\MetodePengirimanModel;
use App\Models\KodePosModel;
use App\Models\PerubahanHargaModel;
use App\Models\SPHProdukModel;

class AdminController extends BaseController
{
    protected $PenggunaModel;
    protected $SPHProdukModel;
    protected $PerubahanHargaModel;
    protected $DiskonModel;
    protected $KodePosModel;
    protected $VoucherModel;
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
        $this->PerubahanHargaModel = new PerubahanHargaModel();
        $this->SPHProdukModel = new SPHProdukModel();
        $this->KodePosModel = new KodePosModel();
        $this->DiskonModel = new DiskonModel();
        $this->VoucherModel = new VoucherModel();
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

    //=================voucher=======================
    public function Voucher()
    {
        $data = [
            'title' =>   'OttenCoffe | Edit Voucher',
            'voucher' => $this->VoucherModel->getVoucher(),
        ];
        return view('admin/editVoucher', $data);
    }

    public function addVoucher()
    {
        $data = [
            'Voucher' => $this->request->getPost('voucher'),
            'Nilai' => $this->request->getPost('nilai'),
            'Jenis_Voucher' => $this->request->getPost('jenis')
        ];

        $this->VoucherModel->insertVoucher($data);
        return redirect()->to(base_url('/voucher'));    }

    public function hapusVoucher($id)
    {
        $this->VoucherModel->delete($id);
        return redirect()->to('/admin/editVoucher'); // URL daftar voucher
    }

    //=========================end voucher=========================


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
    public function editKategori(): string
    {
        $data['title']   = 'OttenCoffe | Edit Kategori';
        return view('admin/editKategori', $data);
    }
}