<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKategoriProdukModel extends Model
{
    protected $table = 'sub_kategori';
    protected $primaryKey = 'ID_SubKategori';
    protected $allowedFields = ['ID_SubKategori','ID_Kategori', 'Nama'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
    
    public function getSubKategoriWithKategori()
    {
        return $this->db->table($this->table)
                        ->join('kategori', 'kategori.ID_Kategori = sub_kategori.ID_Kategori')
                        ->select('sub_kategori.*, kategori.Nama as NamaKategori')
                        ->get()
                        ->getResultArray();
    }

}