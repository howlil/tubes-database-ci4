<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatPoinModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = ['ID_Pesan','Email'];
    protected $allowedFields = ['ID_Pesan', 'Email', 'Tanggal', 'Poin_Perolehan', 'Poin_Digunakan'];
    protected $returnType = 'array';
    protected $useTimestamps = false;


}