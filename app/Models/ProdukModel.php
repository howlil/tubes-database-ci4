<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'ID_Produk';
    protected $allowedFields = ['ID_Produk', 'Kode_Diskon', 'ID_SubKategori', 'ID_FlashSale', 'Nama_Barang', 'Harga_Barang', 'Deskripsi_Belanja', 'Gambar','stok'];
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
    public function getProdukDetail()
    {
        return $this->db->table('produk')
                    ->select('produk.*, kategori.Nama as NamaKategori, sub_kategori.Nama as NamaSubKategori, flash_sale.Nama as NamaFlashSale, produk.stok')
                        ->join('sub_kategori', 'sub_kategori.ID_SubKategori = produk.ID_SubKategori')
                        ->join('kategori', 'kategori.ID_Kategori = sub_kategori.ID_Kategori')
                        ->join('flash_sale', 'flash_sale.ID_FlashSale = produk.ID_FlashSale', 'left')
                        ->get()
                        ->getResultArray();
    }
    

}