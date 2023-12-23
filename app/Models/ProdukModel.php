<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'ID_Produk';
    protected $allowedFields = ['ID_Produk', 'Kode_Diskon', 'ID_SubKategori', 'ID_FlashSale', 'Nama_Barang', 'Harga_Barang', 'Deskripsi_Belanja', 'Gambar', 'Stok'];
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

// Dalam model ProdukModel
public function getProdukWithKategori() {
    $builder = $this->db->table($this->table);
    $builder->select('produk.*, kategori.Nama as KategoriNama, Sub_Kategori.Nama as NamaSubKategori');
    $builder->join('kategori', 'kategori.ID_Kategori = produk.ID_Kategori', 'left');
    $builder->join('Sub_Kategori', 'Sub_Kategori.ID_SubKategori = produk.ID_SubKategori', 'left');
    $builder->groupBy('produk.ID_Produk'); // Menambahkan group by
    return $builder->get()->getResultArray();
}

}