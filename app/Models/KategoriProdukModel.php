<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriProdukModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'ID_Kategori';
    protected $allowedFields = ['Nama'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
    public function getKategori($ID_Kategori = false){
        
        if($ID_Kategori == false){
            return $this->findAll();
        }

        return $this->where(['ID_Kategori'=>$ID_Kategori])->first();
    }

}