<?php

namespace App\Models;

use CodeIgniter\Model;

class SPHProdukModel extends Model
{
    protected $table = 'surat_perubahan_harga';
    protected $primaryKey = 'ID_Surat_Perubahan';
    protected $allowedFields = ['ID_Surat_Perubahan','Tanggal'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}