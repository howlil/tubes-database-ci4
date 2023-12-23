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
    //=================Dashboard=======================

    public function index(): string
    {
        $data = [
            'produk' => $this->ProdukModel->getProdukWithKategori(),
            'title' =>  'OttenCoffe | Dashboard',
        ];
        return view('admin/index', $data);
    }
    public function hapusProduk($idProduk)
    {
        $produkModel = new ProdukModel();
        $produkModel->delete($idProduk);

        // Redirect ke halaman dashboard setelah penghapusan
        return redirect()->to('/dashboard');
    }


    //=================end=======================
    //=================Produk=======================

    public function editProduk(): string
    {
        $data = [
            'title' =>  'OttenCoffe | Edit Produk',
            'produk' => $this->ProdukModel->getProduk(),
            'allKategori' => $this->KategoriProdukModel->findAll(),
            'allDiskon' => $this->DiskonModel->getDiskon(),
            'allFlashSale' => $this->FlashSaleModel->getFlashSale(),
            'subKategori' => $this->SubKategoriProdukModel->getSubKategoriWithKategori(),
        ];
        return view('admin/editProduk', $data);
    }

    public function getSubkategori()
    {
        $kategoriId = $this->request->getGet('kategori');
        $subKategoriModel = new SubKategoriProdukModel();
        $subKategori = $subKategoriModel->where('ID_Kategori', $kategoriId)->findAll();
        return $this->response->setJSON($subKategori);
    }

    public function addProduk()
    {
        $idFlashSale = $this->request->getPost('ID_FlashSale');
        if ($idFlashSale === '') {
            $idFlashSale = null;
        }

        if ($idFlashSale !== null && !$this->FlashSaleModel->find($idFlashSale)) {
            return redirect()->back()->with('error', 'Invalid Flash Sale ID');
        }

        // Handle image upload
        $img = $this->request->getFile('gambar');
        if ($img->isValid() && !$img->hasMoved()) {
            if ($img->getExtension() == 'jpg' || $img->getMimeType() == 'image/jpeg') {
                $newName = $img->getRandomName();
                $img->move('public/images', $newName);
                $imagePath = 'public/images/' . $newName;
            } else {
                // Handle invalid file type
                return redirect()->back()->with('error', 'Please upload a valid JPG image.');
            }
        } else {
            // Handle file upload error
            return redirect()->back()->with('error', 'Error in uploading image.');
        }

        // Prepare other data for database insertion
        $data = [
            'ID_Produk' => $this->request->getPost('ID_Produk'),
            'Kode_Diskon' => $this->request->getPost('Kode_Diskon'),
            'ID_SubKategori' => $this->request->getPost('ID_SubKategori'),
            'ID_Flash_Sale' => $idFlashSale, // Using the processed ID
            'Nama_Barang' => $this->request->getPost('Nama_Barang'),
            'Harga_Barang' => $this->request->getPost('Harga_Barang'),
            'ID_Kategori' => $this->request->getPost('ID_Kategori'),
            'Deskripsi_Barang' => $this->request->getPost('deskripsi'),
            'Gambar' => $imagePath, // Using the image path
            'Stok' => $this->request->getPost('stok'),
        ];
        try {
            $this->ProdukModel->insertProduk($data);
            return redirect()->to('/edit-produk')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    //=================end=======================

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


        // Get the dates from the POST data
        $tanggalMulai = $this->request->getPost('tanggalMulai');
        $tanggalBerakhir = $this->request->getPost('tanggalBerakhir');

        $data = [
            'ID_Voucher' => $voucher,
            'Nilai' => $nilai, // Assuming $nilai is already set and converted if needed
            'Nama_Voucher' => $jenisVoucher, // Assuming $jenisVoucher is already set
            'Tanggal_Mulai' => $tanggalMulai,
            'Tanggal_Berakhir' => $tanggalBerakhir,
        ];


        $this->VoucherModel->insertVoucher($data);
        return redirect()->to(base_url('/voucher'));
    }

    public function hapusVoucher($data)
    {
        $this->VoucherModel->deleteVoucher($data);
        return redirect()->to(base_url('/voucher'));
    }
    //=========================end =========================

    //=========================Diskon=========================

    public function editDiskon(): string
    {
        $data = [
            'title' =>   'OttenCoffe | Edit Diskon',
            'diskon' => $this->DiskonModel->getDiskon(),
        ];
        return view('admin/editDiskon', $data);
    }

    public function addDiskon()
    {
        // Mendapatkan data dari form dan mengonversinya ke tipe yang sesuai
        $kodeDiskon = $this->request->getPost('kodeDiskon');
        $nilaiDiskon = floatval($this->request->getPost('nilaiDiskon')); // Konversi ke float
        $tanggalMulai = $this->request->getPost('tanggalMulai');
        $tanggalBerakhir = $this->request->getPost('tanggalBerakhir');


        $data = [
            'Kode_Diskon' => $kodeDiskon,
            'Nilai' => $nilaiDiskon,
            'Tanggal_Mulai' => $tanggalMulai,
            'Tanggal_Berakhir' => $tanggalBerakhir,
        ];
        $this->DiskonModel->insertDiskon($data);
        return redirect()->to(base_url('/edit-diskon'));
    }
    public function hapusDiskon($data)
    {
        $this->DiskonModel->deleteDiskon($data);
        return redirect()->to(base_url('/edit-diskon'));
    }
    //=========================end =========================

    //=========================Flash Sale=========================

    public function editFlashSale(): string
    {

        $data = [
            'title' =>   'OttenCoffe | Edit Flash Sale',
            'flashsale' => $this->FlashSaleModel->getFlashSale(),
        ];
        return view('admin/editFlashsale', $data);
    }
    public function addFlashSale()
    {


        $flashsaleIDE = $this->request->getPost('flashsaleID');
        $nama = $this->request->getPost('namaFlashSale');
        $nilai = floatval($this->request->getPost('nilaiFlashSale')); // Konversi ke float
        $startRaw = $this->request->getVar('waktuMulai');
        $endRaw = $this->request->getVar('waktuBerakhir');
        $logger = service('logger');

        if ($startRaw && strtotime($startRaw) !== false) {
            $start = date("H:i:s", strtotime($startRaw));
        } else {
            // Handle invalid format or log error
            $logger->error('Invalid start time format: ' . $startRaw);
            $start = null;
        }

        if ($endRaw && strtotime($endRaw) !== false) {
            $end = date("H:i:s", strtotime($endRaw));
        } else {
            // Handle invalid format or log error
            $logger->error('Invalid end time format: ' . $endRaw);
            $end = null;
        }


        $data = [
            'ID_Flash_Sale' => $flashsaleIDE,
            'Waktu_Mulai' => $start,
            'Waktu_Berakhir' => $end,
            'Nilai' => $nilai,
            'Nama' => $nama,
        ];
        $this->FlashSaleModel->insertFlashSale($data);
        return redirect()->to(base_url('/edit-flash-sale'));
    }

    public function deleteFlashSale($data)
    {
        $this->FlashSaleModel->deleteFlashSale($data);
        return redirect()->to(base_url('/edit-flash-sale'));
    }
    //=========================end =========================

    //=========================Kategori=========================
    public function editKategori()
    {


        $data = [
            'title' => 'OttenCoffe | Edit Kategori',
            'kategori' => $this->KategoriProdukModel->getKategoriWithSubKategori(),
            'allKategori' => $this->KategoriProdukModel->findAll(),
        ];
     
        return view('admin/editKategori', $data);
    }

    public function addKategori()
    {


        $kategoriNama = $this->request->getPost('kategoriNama');
        $kategoriId = $this->request->getPost('kategoriId');
        $this->KategoriProdukModel->insert([
            'ID_Kategori' => $kategoriId,
            'Nama' => $kategoriNama
        ]);

        return redirect()->to('/edit-kategori');
    }

    public function addSubKategori()
    {
        $subkategoriId = $this->request->getPost('subkategoriId');
        $kategoriId = $this->request->getPost('kategoriId');
        $subkategoriNama = $this->request->getPost('subkategoriNama');
    
        $subKategoriModel = new SubKategoriProdukModel();
    
        $existingSubkategori = $subKategoriModel->find($subkategoriId);
        if ($existingSubkategori) {
            session()->setFlashdata('error', 'ID Subkategori sudah ada.');
            return redirect()->to('/edit-kategori');
        }
    
        // Insert data ke database
        $subKategoriModel->insert([
            'ID_Kategori' => $kategoriId,
            'ID_SubKategori' => $subkategoriId,
            'Nama' => $subkategoriNama,
        ]);
    
        session()->setFlashdata('success', 'Subkategori berhasil ditambahkan.');
        return redirect()->to('/edit-kategori');
    }
    

    public function hapusKategori($id)
    {
        if (empty($id) || !is_numeric($id)) {
            // Handling invalid or empty $id
            // For example, setting a flashdata message and redirecting to an error page or the listing page
            session()->setFlashdata('error', 'Invalid Category ID');
            return redirect()->to('/edit-kategori');
        }

        $this->KategoriProdukModel->where('ID_Kategori', $id)->delete();
        session()->setFlashdata('success', 'Category successfully deleted');
        return redirect()->to('/edit-kategori');
    }

    public function hapusSubKategori($id)
    {
        if (empty($id) || !is_numeric($id)) {
            session()->setFlashdata('error', 'Invalid Subcategory ID');
            return redirect()->to('/edit-kategori');
        }

        $this->SubKategoriProdukModel->where('ID_SubKategori', $id)->delete();
        session()->setFlashdata('success', 'Subcategory successfully deleted');
        return redirect()->to('/edit-kategori');
    }
    //=========================end=========================

}