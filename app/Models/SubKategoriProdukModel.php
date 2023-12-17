<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKategoriProdukModel extends Model
{
    protected $table = 'sub_kategori';
    protected $primaryKey = 'ID_SubKategori';
    protected $allowedFields = ['ID_SubKategori','ID_Kategori', 'Nama'];
    protected $returnType = 'array';
    protected $useTimestamps = false;


}