<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'Email';
    protected $allowedFields = ['Username', 'Password', 'Alamat', 'Nama', 'Saldo_Point'];
    protected $returnType = 'array';
    protected $useTimestamps = false;



}