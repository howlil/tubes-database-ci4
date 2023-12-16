<?php

namespace App\Models;

use CodeIgniter\Model;

class SPHProdukModel extends Model
{
    protected $table = 'surat_perubahan_harga_produk';
    protected $primaryKey = 'ID_Surat_Produk';
    protected $allowedFields = ['Tanggal', 'Harga'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}
