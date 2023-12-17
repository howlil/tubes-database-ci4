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

    //=================Payment=======================
    public function editPembayaran(): string
    {

        $data = [
            'title' =>  'OttenCoffe | Edit Pembayaran',
            'pay' => $this->MetodePembayaranModel->getPay(),
        ];
        return view('admin/editMetodePembayaran', $data);
    }
    public function addPembayaran()
    {
        $data = [
            'ID_Metode_Pembayaran' => $this->request->getPost('ID_Metode_Pembayaran'),
            'Metode_Pembayaran' => $this->request->getPost('Nama_Metode_Pembayaran'),
        ];
        $this->MetodePembayaranModel->insertPay($data);
        return redirect()->to('/edit-pembayaran');
    }

    public function hapusPembayaran($id)
    {
        $this->MetodePembayaranModel->deletePay($id);
        return redirect()->to('/edit-pembayaran');
    }
    //=================end=======================

    //=================Shiping=======================

    public function editPengiriman(): string
    {
        $data = [
            'title' =>  'OttenCoffe | Edit Pengiriman',
            'ship' => $this->MetodePengirimanModel->getShip(),
        ];
        return view('admin/editMetodePengiriman', $data);
    }

    public function addPengiriman()
    {
        $data = [
            'ID_Metode_Pengiriman' => $this->request->getPost('ID_Metode_Pengiriman'),
            'Metode_Pengiriman' => $this->request->getPost('Nama_Metode_Pengiriman'),
        ];
        $this->MetodePengirimanModel->insertShip($data);
        return redirect()->to('/edit-pengiriman');
    }

    public function hapusPengiriman($id)
    {
        $this->MetodePengirimanModel->deleteShip($id);
        return redirect()->to('/edit-pengiriman');
    }
    //=================end=======================

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
        // Mendapatkan data dari form dan mengonversinya ke tipe yang sesuai
        $voucher = $this->request->getPost('voucher');
        $nilai = floatval($this->request->getPost('nilai')); // Konversi ke float
        $jenisVoucher = $this->request->getPost('jenis');

        // Menyiapkan array data untuk disimpan
        $data = [
            'Voucher' => $voucher,
            'Nilai' => $nilai, // Menggunakan nilai yang sudah dikonversi
            'Jenis_Voucher' => $jenisVoucher
        ];
        $this->VoucherModel->insertVoucher($data);
        return redirect()->to(base_url('/voucher'));
    }

    public function hapusVoucher($data)
    {
        $this->VoucherModel->deleteVoucher($data);
        return redirect()->to(base_url('/voucher'));
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

    //=========================Kategori=========================
    public function editKategori(): string
    {
        $data = [
            'title' =>  'OttenCoffe | Edit Kategori',
            'kategori' => $this->KategoriProdukModel->getKategoriWithSubKategori(),
        ];
        return view('admin/editKategori', $data);
    }
    //=========================end=========================

}