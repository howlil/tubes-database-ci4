<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table = 'diskon';
    protected $primaryKey = 'Kode_Diskon';
    protected $allowedFields = ['Kode_Diskon','Nilai', 'Tanggal_Mulai', 'Tanggal_Berakhir'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getDiskon()
    {
        return $this->db->table('diskon')->get()->getResultArray();
    }
    public function insertDiskon($data)
    {
        return $this->db->table('diskon')->insert($data);
    }
    public function deleteDiskon($data)
    {
        return $this->where('Kode_Diskon', $data)->delete();
    }

  
}