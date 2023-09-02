<?php

namespace App\Models;

use CodeIgniter\Model;

class Penerbit extends Model
{
    protected $table            = 'penerbit';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_penerbit', 'nama_penerbit', 'alamat','no_hp'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPenerbit($id = false)
    {
        if(!$id == false)
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

}
