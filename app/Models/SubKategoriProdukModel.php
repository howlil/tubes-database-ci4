<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKategoriProdukModel extends Model
{
    protected $table = 'sub_kategori';
    protected $primaryKey = 'ID_SubKategori';
    protected $allowedFields = ['ID_Kategori', 'Nama'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function getSubKategori($ID_SubKategori = false){
        
        if($ID_SubKategori == false){
            return $this->findAll();
        }

        return $this->where(['ID_SubKategorik'=>$ID_SubKategori])->first();
    }

}