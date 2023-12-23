<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'ID_Produk';
    protected $allowedFields = ['ID_Produk', 'Kode_Diskon', 'ID_SubKategori', 'ID_FlashSale', 'Nama_Barang', 'Harga_Barang', 'Deskripsi_Belanja', 'Gambar', 'stok'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function getProduk()
    {
        return $this->db->table('produk')->get()->getResultArray();
    }
    public function insertProduk($data)
    {
        return $this->db->table('produk')->insert($data);
    }
    public function deleteProduk($idProduk)
    {
        return $this->where('ID_Produk', $idProduk)->delete();
    }

}