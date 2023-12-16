<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'ID_Produk';
    protected $allowedFields = ['Kode_Diskon', 'ID_SubKategori', 'ID_FlashSale', 'Nama_Barang', 'Harga_Barang', 'Deskripsi_Belanja', 'Gambar'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function getPelanggan($ID_Produk = false)
    {

        if ($ID_Produk == false) {
            return $this->findAll();
        }

        return $this->where(['ID_Produk' => $ID_Produk])->first();
    }
}
