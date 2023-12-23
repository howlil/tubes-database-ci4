<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;
class FlashSaleModel extends Model
{
    protected $table = 'flash_sale';
    protected $primaryKey = '	ID_Flash_Sale';
    protected $allowedFields = ['	ID_Flash_Sale', 'Waktu_Mulai', 'Waktu_Berakhir', 'Nilai', 'Nama'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getFlashSale()
    {
        return $this->db->table('flash_sale')->get()->getResultArray();
    }
    public function insertFlashSale($data)
    {
        return $this->db->table('flash_sale')->insert($data);
    }
    public function deleteFlashSale($data)
    {
        return $this->where('	ID_Flash_Sale   ', $data)->delete();
    }



}