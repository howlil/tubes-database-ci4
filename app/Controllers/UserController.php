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
        $subkategoriModel = new SubKategoriProdukModel();
        $data = [
            'title' => 'OttenCoffe',
            'kategori' => $this->KategoriProdukModel->findAll(),
            'subkategori' => $subkategoriModel->getSubKategoriWithKategori(),
        ];

        return view('user/index', $data);
    }



    //============Katgeori====================
    public function kategori()
    {
        $data = [
            'title' => 'OttenCoffe | Kategori',
            'produk' => $this->ProdukModel->getProdukWithKategori(),
        ];
        return view('user/kategori', $data);
    }
    //============End====================

    //============Cart====================
    public function keranjang()
    {
        $model = new RincianPemesananModel();

        $data = [
            'title' => 'OttenCoffe | Keranjang',
            'produkcart' => $model->getProdukInKeranjang(), // Fungsi yang akan kita buat
        ];
        return view('user/keranjang', $data);
    }

    public function addKeranjang()
    {
        $model = new RincianPemesananModel();

        $data = [
            'ID_Pesan' => $this->request->getPost('ID_Pesan'),
            'ID_Produk' => $this->request->getPost('product_id'),
            'Harga_Beli' => $this->request->getPost('product_price'),
            'Jumlah_Barang' => 1, // atau nilai lain sesuai kebutuhan
        ];
        
        $model->insert($data);
        return redirect()->to('/keranjang')->with('message', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function hapusDariKeranjang($id)
    {
        $model = new RincianPemesananModel();
        $model->delete($id);

        return redirect()->to('/keranjang')->with('message', 'Produk berhasil dihapus dari keranjang');
    }

    public function showKeranjang()
    {
        $idPemesanan = session()->get('ID_Pesan');

        if (is_null($idPemesanan)) {
            return view('layout/navbar', ['produkcart' => []]);
        }

        $model = new RincianPemesananModel();
        $produkcart = $model->where('ID_Pesan', $idPemesanan)->findAll();

        return view('layout/navbar', ['produkcart' => $produkcart]);
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