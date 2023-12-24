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
use App\Models\UserModel;

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

    // =============setting=====================
    public function setting()
    {
        $session = session();
        $userId = $session->get('userId');
        $userModel = new UserModel();
        $penggunaModel = new PenggunaModel();

        $user = $userModel->find($userId);
        if (!$user) {
            // Handle user not found
        }

        $email = $user['email'];
        $penggunaData = $penggunaModel->where('Email', $email)->first();

        $data = [
            'title' => 'Profile Setting',
            'userData' => $penggunaData,
        ];

        return view('user/profile', $data);
    }



    public function updateProfile()
    {
        $model = new PenggunaModel();

        // Assuming you have the user's email in your session
        $userEmail = session()->get('userEmail');

        $data = [
            'Nama' => $this->request->getPost('nama'),
            'Alamat' => $this->request->getPost('alamat')
        ];

        // Update data for the user with the given email
        $model->where('Email', $userEmail)->set($data)->update();

        return redirect()->to('/setting')->with('success', 'Profil berhasil diperbarui.');
    }

    public function transferEmail()
    {
        $userModel = new UserModel();
        $penggunaModel = new PenggunaModel();

        $users = $userModel->findAll();

        foreach ($users as $user) {
            $data = [
                'email' => $user['email'],
                // 'nama' => $user['name'], // Uncomment if you have name in users table
                // Add other data if needed
            ];
            $penggunaModel->insert($data);
        }

        // Redirect or set a success message
        return redirect()->to('/setting');
    }


    // ===========================================

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
        $idProduk = $this->request->getPost('product_id');
        $hargaBeli = $this->request->getPost('product_price');

        $idPesan = $this->buatAtauDapatkanIdPemesanan();

        $modelRincian = new RincianPemesananModel();
        $modelRincian->insert([
            'ID_Pesan' => $idPesan,
            'ID_Produk' => $idProduk,
            'Harga_Beli' => $hargaBeli,
            'Jumlah_Barang' => 1, // asumsi jumlah barang adalah 1
        ]);

        return redirect()->to('/kategori');
    }

    private function buatAtauDapatkanIdPemesanan()
    {
        $session = session();
        $email = $session->get('email'); // asumsikan user_id tersimpan di sesi

        $modelPemesanan = new PemesananModel();

        // Cek apakah sudah ada pemesanan yang aktif untuk user ini
        $pemesananAktif = $modelPemesanan->where('email', $email)
            ->first();

        if ($pemesananAktif) {
            return $pemesananAktif['ID_Pesan'];
        } else {
            // Tidak ada pemesanan aktif, buat pemesanan baru
            $modelPemesanan->insert([
                'email' => $email,
                // tambahkan kolom lain yang diperlukan
            ]);

            return $modelPemesanan->getInsertID();
        }
    }





    //============End====================
    public function checkout()
    {
        $data['title'] = 'Checkout';
        return view('user/checkoutPengiriman', $data);
    }

    public function bayar()
    {
        $data['title'] = 'Pembayaran';
        return view('user/checkoutPembayaran', $data);
    }
    public function konfirmasipembayaran()
    {
        $data['title'] = 'Konfirmasi';
        echo view('user/konfirmasipembayaran', $data);
    }
}