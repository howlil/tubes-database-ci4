<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriProdukModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'ID_Kategori';
    protected $allowedFields = ['ID_Kategori', 'Nama'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function getKategoriWithSubKategori()
    {
        $builder = $this->db->table('kategori');
        $builder->select('kategori.*, sub_kategori.Nama as SubKategoriNama, sub_kategori.ID_SubKategori');
        $builder->join('sub_kategori', 'sub_kategori.ID_Kategori = kategori.ID_Kategori', 'left');
        return $builder->get()->getResultArray();
    }
}
