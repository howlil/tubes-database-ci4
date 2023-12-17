<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodePengirimanModel extends Model
{
    protected $table = 'metode_pengiriman';
    protected $primaryKey = 'ID_Metode_Pengiriman';
    protected $allowedFields = ['ID_Metode_Pengiriman','Metode_Pengiriman'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
    
    public function getShip()
    {
        return $this->db->table('metode_pengiriman')->get()->getResultArray();
    }
    public function insertShip($data)
    {
        return $this->db->table('metode_pengiriman')->insert($data);
    }
    public function deleteShip($data)
    {
        return $this->where('ID_Metode_Pengiriman', $data)->delete();
    }
}