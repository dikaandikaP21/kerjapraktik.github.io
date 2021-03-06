<?php

namespace App\Models;

use CodeIgniter\Model;

class Laporan_anggaranModel extends Model
{
    protected $table = 'laporan_anggaran';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'deskripsi', 'file_anggaran'];


    public function getLaporan_anggaran($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->WHERE(['id' => $id])->first();
    }
}
