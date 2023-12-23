<?php

namespace App\Models;

use CodeIgniter\Model;

class VoucherModel extends Model
{
    protected $table = 'kode_voucher';
    protected $primaryKey = 'ID_Voucher';
    protected $allowedFields = ['ID_Voucher', 'Nilai','Nama_Voucher', 'Tanggal_Mulai', 'Tanggal_Berakhir'];
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
    public function deleteVoucher($data)
    {
        return $this->where('ID_Voucher', $data)->delete();
    }
    
    public function convertDateToYMD($dateStr) {
        if (!empty($dateStr)) {
            $dateObject = \DateTime::createFromFormat('m/d/Y', $dateStr);
            if ($dateObject) {
                return $dateObject->format('Y-m-d');
            }
        }
        return null; // Return null if the date is not valid or empty
    }
    
    
}