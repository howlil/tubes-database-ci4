<?php

namespace App\Models;

use CodeIgniter\Model;

class KodePosModel extends Model
{
    protected $table = 'kode_pos';
    protected $primaryKey = 'Kode_Pos';
    protected $allowedFields = ['Kode_Pos', 'Provinsi', 'Kota', 'Kecamatan', 'Kelurahan'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}
