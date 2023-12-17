<?php

namespace App\Models;

use CodeIgniter\Model;

class VoucherModel extends Model
{
    protected $table = 'kode_voucher';
    protected $primaryKey = 'Voucher';
    protected $allowedFields = ['Voucher', 'Nilai', 'Jenis_Voucher'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

 
    public function getVoucher()
    {
        return $this->db->table('kode_voucher')->get()->getResultArray();
    }
    public function insertVoucher($data)
    {
        return $this->db->table('kode_voucher')->insert($data);
    }
}