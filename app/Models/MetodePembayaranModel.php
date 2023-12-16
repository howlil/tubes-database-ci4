<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodePembayaranModel extends Model
{
    protected $table = 'metode_pembayaran';
    protected $primaryKey = 'ID_Metode_Pembayaran';
    protected $allowedFields = ['Metode_Pembayaran'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
    
    public function getPembayaran($id_bayar = false){
        
        if($id_bayar== false){
            return $this->findAll();
        }

        return $this->where(['ID_Metode_Pengiriman'=>$id_bayar])->first();
    }
}