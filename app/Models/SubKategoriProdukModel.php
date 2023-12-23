<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKategoriProdukModel extends Model
{
    protected $table = 'sub_kategori';
    protected $primaryKey = 'ID_SubKategori';
    protected $allowedFields = ['ID_SubKategori','ID_Kategori', 'Nama','Gambar'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
    

    public function findByCompositeKey($subkategoriId, $kategoriId) {
        return $this->where('ID_SubKategori', $subkategoriId)
                    ->where('ID_Kategori', $kategoriId)
                    ->first();
    }
    
}