<?php

namespace App\Models;

use CodeIgniter\Model;

class FlashSaleModel extends Model
{  
    protected $table = 'flash_sale';
    protected $primaryKey = 'ID_FlashSale';
    protected $allowedFields = ['Waktu_Mulai', 'Waktu_Berakhir', 'Nilai'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getFlashSale($FlashSale = false){
        
        if($FlashSale == false){
            return $this->findAll();
        }

        return $this->where(['ID_FlashSale'=>$FlashSale])->first();
    }

}