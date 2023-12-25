<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'Email';
    protected $allowedFields = ['Email', 'Alamat', 'Nama', 'Saldo_Point'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function getDataByUserId($userId)
    {
        $builder = $this->db->table('users');
        $builder->select('pengguna.*');
        $builder->join('pengguna', 'pengguna.Email = users.email', 'left');
        $builder->where('users.id', $userId);
        return $builder->get()->getRowArray();
    }

    public function updateData($email, $data)
    {
        return $this->update($email, $data);
    }
}