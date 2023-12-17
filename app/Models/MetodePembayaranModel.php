<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodePembayaranModel extends Model
{
    protected $table = 'metode_pembayaran';
    protected $primaryKey = 'ID_Metode_Pembayaran';
    protected $allowedFields = ['ID_Metode_Pembayaran','Metode_Pembayaran'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
    
    public function getPay()
    {
        return $this->db->table('metode_pembayaran')->get()->getResultArray();
    }
    public function insertPay($data)
    {
        return $this->db->table('metode_pembayaran')->insert($data);
    }
    public function deletePay($data)
    {
        return $this->where('ID_Metode_Pembayaran', $data)->delete();
    }
}