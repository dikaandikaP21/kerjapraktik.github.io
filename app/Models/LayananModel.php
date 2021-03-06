<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['layanan_ktp', 'layanan_kia'];


    public function getLayanan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->WHERE(['id' => $id])->first();
    }
}
