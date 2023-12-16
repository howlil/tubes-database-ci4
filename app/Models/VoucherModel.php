<?php

namespace App\Models;

use CodeIgniter\Model;

class Voucherodel extends Model
{
    protected $table = 'kode_voucher';
    protected $primaryKey = 'Voucher';
    protected $allowedFields = ['Nilai', 'Jenis_Voucher'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function getVoucher($Kode_Voucher = false)
    {

        if ($Kode_Voucher == false) {
            return $this->findAll();
        }

        return $this->where(['Kode_Voucher' => $Kode_Voucher])->first();
    }
}