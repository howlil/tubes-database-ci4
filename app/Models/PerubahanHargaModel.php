<?php

namespace App\Models;

use CodeIgniter\Model;

class PerubahanHargaModel extends Model
{
    protected $table = 'perubahan_harga_produk';
    protected $primaryKey = 'ID_Produk'; // If there's a composite key, handle it in the model logic
    protected $allowedFields = ['ID_Produk','ID_Surat_Perubahan', 'Harga_Produk'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}