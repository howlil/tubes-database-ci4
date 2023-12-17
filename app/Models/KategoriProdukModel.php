<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriProdukModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'ID_Kategori';
    protected $allowedFields = ['ID_Kategori','Nama'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
  

    public function getKategoriWithSubKategori()
    {
        return $this->db->table('kategori')
                        ->select('kategori.ID_Kategori, kategori.Nama as KategoriNama, sub_kategori.Nama as SubKategoriNama, sub_kategori.ID_SubKategori')
                        ->join('sub_kategori', 'sub_kategori.ID_Kategori = kategori.ID_Kategori', 'left')
                        ->orderBy('kategori.ID_Kategori', 'ASC')
                        ->get()
                        ->getResultArray();
    }


}