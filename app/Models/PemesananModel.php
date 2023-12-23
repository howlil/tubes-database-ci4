<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = ['ID_Pesan', 'Email'];
    protected $allowedFields = ['ID_Pesan', 'Email', 'ID_Metode_Pembayaran', 'ID_Voucher', 'Kode_Pos', 'ID_Metode_Pengiriman',  'Total_Barang', 'Total_Pemesanan', 'Alamat_Rumah', 'Tanggal_Transaksi'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}