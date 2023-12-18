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
        $kategoriModel = new KategoriProdukModel();
        $subkategoriModel = new SubKategoriProdukModel();
        $data = [
            'title' => 'OttenCoffe',
            'kategori' => $kategoriModel->findAll(),
            'subkategori' => $subkategoriModel->getSubKategoriWithKategori(),
        ];

        return view('user/index', $data);
    }



    //============Katgeori====================
    public function kategori()
    {
        $data = [
            'title' => 'OttenCoffe | Kategori',
            'produk' => $this->ProdukModel->getProdukDetail(),
        ];
        return view('user/kategori', $data);
    }
    //============End====================

    //============Cart====================
    public function keranjang()
    {
        $data = [
            'title' => 'OttenCoffe | Keranjang',
            'produk' => $this->ProdukModel->getProdukDetail(),
        ];
        echo view('user/keranjang', $data);
    }

    public function addKeranjang()
    {
        $model = new RincianPemesananModel();
        $data = [
            'ID_Produk' => $this->request->getPost('ID_Produk'),
            'Harga_Barang' => $this->request->getPost('Harga_Barang'),
            'Total_Belanja' => $this->request->getPost('Total_Belanja'),


        ];

        $model->addKeranjang($data);
        return redirect()->back()->with('message', 'Produk berhasil ditambahkan ke keranjang');
        return redirect()->to('/keranjang');
    }

    public function showKeranjang()
    {
        $model = new RincianPemesananModel();
        $data = [
            'produkcart' => $model->findAll(), // Mengambil semua data keranjang
        ];

        return view('layout/navbar', $data);
    }



    //============End====================
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
