<?php

namespace App\Models;

use CodeIgniter\Model;

class KodePosModel extends Model
{
    protected $table = 'kode_pos';
    protected $primaryKey = 'Kode_Pos';
    protected $allowedFields = ['Provinsi', 'Kota', 'Kecamatan', 'Kelurahan'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function getKodePos($kode_pos = false){
        
        if($kode_pos == false){
            return $this->findAll();
        }

        return $this->where(['kode_pos'=>$kode_pos])->first();
    }

}