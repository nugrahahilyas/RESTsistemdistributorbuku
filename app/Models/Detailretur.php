<?php

namespace App\Models;

use CodeIgniter\Model;

class Detailretur extends Model
{
    protected $table            = 'detailretur';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_penjualan','id_buku','jumlah','created_at','updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
