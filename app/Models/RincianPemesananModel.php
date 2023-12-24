<?php

namespace App\Models;

use CodeIgniter\Model;

class RincianPemesananModel extends Model
{
    protected $table = 'rincian_pemesanan';
    protected $primaryKey = ['ID_Pesan','ID_Produk'];
    protected $allowedFields = ['ID_Pesan','ID_Produk', 'Harga_Barang', 'Total_Belanja'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function addKeranjang($data)
    {
        return $this->insert($data);
    }
 
}