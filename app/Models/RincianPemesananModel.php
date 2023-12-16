<?php

namespace App\Models;

use CodeIgniter\Model;

class RincianPemesananModel extends Model
{
    protected $table = 'rincian_pemesanan';
    protected $primaryKey = 'ID_Pesan'; // If there's a composite key, handle it in the model logic
    protected $allowedFields = ['ID_Produk', 'Harga_Barang', 'Total_Belanja'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}