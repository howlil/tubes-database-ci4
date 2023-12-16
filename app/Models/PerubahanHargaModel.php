<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKategoriProdukModel extends Model
{
    protected $table = 'perubahan_harga_produk';
    protected $primaryKey = 'ID_Produk'; // If there's a composite key, handle it in the model logic
    protected $allowedFields = ['ID_Surat_Produk'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}