<?php

namespace App\Models;

use CodeIgniter\Model;

class RincianPemesananModel extends Model
{
    protected $table = 'rincian_pemesanan';
    protected $primaryKey = 'ID_Pesan';
    protected $allowedFields = ['ID_Produk', 'Harga_Barang', 'Total_Belanja'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function addKeranjang($data)
    {
        return $this->insert($data);
    }
    public function getKeranjang()
    {
        return $this->db->table('rincian_pemesanan')->get()->getResultArray();
    }
}