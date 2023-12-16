<?php

namespace App\Models;

use CodeIgniter\Model;

class OttenPointModel extends Model
{
    protected $table      = 'otten_point';
    protected $allowedFields = ['ID_Otten',	'Total_Poin','Tanggal_Perolehan','Tanggal_Kedaluwarsa'	];
}