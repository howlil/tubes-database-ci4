<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodePengirimanModel extends Model
{
    protected $table = 'metode_pengiriman';
    protected $primaryKey = 'ID_Metode_Pengiriman';
    protected $allowedFields = ['Metode_Pengiriman'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function getPengiriman($id_kirim = false)
    {

        if ($id_kirim == false) {
            return $this->findAll();
        }

        return $this->where(['ID_Metode_Pengiriman' => $id_kirim])->first();
    }
}
