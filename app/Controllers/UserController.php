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
        $session = session();
        $isLoggedIn = $session->get('logged_in'); // Contoh, sesuaikan dengan cara Anda mengecek login

        $subkategoriModel = new SubKategoriProdukModel();
        $data = [
            'title' => 'OttenCoffe',
            'kategori' => $this->KategoriProdukModel->findAll(),
            'subkategori' => $subkategoriModel->getSubKategoriWithKategori(),
            'logged_in' => $isLoggedIn,
        ];

        return view('user/index', $data);
    }



    //============Katgeori====================
    public function kategori()
    {
        $subkategoriModel = new SubKategoriProdukModel();

        $data = [
            'title' => 'OttenCoffe | Kategori',
            'produk' => $this->ProdukModel->getProdukWithKategori(),
            'kategori' => $this->KategoriProdukModel->findAll(),
            'subkategori' => $subkategoriModel->getSubKategoriWithKategori(),
        ];
        return view('user/kategori', $data);
    }
    //============End====================

    //============Cart====================
    public function keranjang()
    {

        $data = [
            'title' => 'OttenCoffe | Keranjang',
        ];
        return view('user/keranjang', $data);
    }

    public function addKeranjang()
    {


        $pemesananModel = new PemesananModel();
        $rincianPemesananModel = new RincianPemesananModel();

        // Buat ID Pemesanan Baru
        $idPesan = uniqid('pesan_');
        $dataPemesanan = [
            'ID_Pesan' => $idPesan,
        ];
        $pemesananModel->createPemesanan($dataPemesanan);

        // Data untuk Rincian Pemesanan
        $dataRincianPemesanan = [
            'ID_Pesan' => $idPesan,
            'ID_Produk' => $this->request->getPost('product_id'),
            'Harga_Beli' => $this->request->getPost('product_price'),
            'Jumlah_Barang' => 1, // atau sesuai dengan input user
        ];

        $rincianPemesananModel->addKeranjang($dataRincianPemesanan);

        return redirect()->to('/keranjang');
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