<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'ID_Pesan';
    protected $allowedFields = ['Email', 'ID_Metode_Pembayaran', 'ID_Metode_Pengiriman', 'ID_Voucher', 'ID_Often', 'Kode_Pos', 'Tanggal_Transaksi', 'Jumlah_Produk', 'Alamat_Rumah', 'Riwayat_Point_Perolehan', 'Riwayat_Point_Digunakan'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
    
    }