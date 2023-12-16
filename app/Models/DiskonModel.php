<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table = 'diskon';
    protected $primaryKey = 'Kode_Diskon';
    protected $allowedFields = ['Nilai', 'Tanggal_Mulai', 'Tanggal_Berakhir'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getDiskon($Kode_Diskon = false)
    {

        if ($Kode_Diskon == false) {
            return $this->findAll();
        }

        return $this->where(['Kode_Diskon' => $Kode_Diskon])->first();
    }
}
